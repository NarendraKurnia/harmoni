<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AINewsController extends Controller
{
    public function index(Request $request)
    {
        $newsApiKey   = env('NEWSAPI_KEY');
        $newsdataKey  = env('NEWSDATA_KEY');
        $gnewsKey     = env('GNEWS_KEY');

        $keywords = $request->get('q', 'artificial intelligence');
        $cacheKey = 'ainews:' . md5($keywords);

        // Cache singkat agar tidak cepat kena rate-limit (TTL 120 detik)
        $articles = Cache::remember($cacheKey, 120, function () use ($keywords, $newsApiKey, $newsdataKey, $gnewsKey) {
            $collected = [];

            // ---------- 1) NewsAPI (jika ada key) ----------
            if (!empty($newsApiKey)) {
                try {
                    $resp = Http::get('https://newsapi.org/v2/everything', [
                        'q'        => $keywords,
                        'apiKey'   => $newsApiKey,
                        'pageSize' => 10,
                        'language' => 'en',
                        'sortBy'   => 'publishedAt',
                    ]);

                    if ($resp->ok()) {
                        $items = $resp->json('articles') ?? [];
                        foreach ($items as $it) {
                            $collected[] = [
                                'title'       => $it['title'] ?? '',
                                'description' => $it['description'] ?? '',
                                'url'         => $it['url'] ?? '#',
                                'source'      => $it['source']['name'] ?? 'NewsAPI',
                                'publishedAt' => $it['publishedAt'] ?? Carbon::now()->toIso8601String(),
                                'urlToImage'  => $it['urlToImage'] ?? null,
                            ];
                        }
                    } else {
                        Log::warning('NewsAPI returned non-ok status: ' . $resp->status());
                    }
                } catch (\Throwable $e) {
                    Log::error('NewsAPI exception: ' . $e->getMessage());
                }
            }

            // ---------- 2) NewsData.io (jika ada key) ----------
            if (!empty($newsdataKey)) {
                try {
                    // endpoint /api/1/news atau /api/1/latest ; gunakan /api/1/news untuk cakupan
                    $resp = Http::get('https://newsdata.io/api/1/news', [
                        'apikey'   => $newsdataKey,
                        'q'        => $keywords,
                        'language' => 'en',
                        'page'     => 0,
                    ]);

                    if ($resp->ok()) {
                        $body = $resp->json();
                        // NewsData bisa return 'results' atau 'results' under different keys — cek dokumentasi
                        $items = $body['results'] ?? $body['news'] ?? $body['data'] ?? [];
                        foreach ($items as $it) {
                            // NewsData fields: title, link/url, source_id/source, pubDate or pubDate?
                            $collected[] = [
                                'title'       => $it['title'] ?? ($it['title'] ?? ''),
                                'description' => $it['description'] ?? ($it['summary'] ?? ''),
                                'url'         => $it['link'] ?? $it['url'] ?? '#',
                                'source'      => $it['source_id'] ?? ($it['source'] ?? 'NewsData'),
                                'publishedAt' => $it['pubDate'] ?? $it['pub_date'] ?? ($it['publishedAt'] ?? Carbon::now()->toIso8601String()),
                                'urlToImage'  => $it['image_url'] ?? ($it['image'] ?? null),
                            ];
                        }
                    } else {
                        Log::warning('NewsData returned non-ok status: ' . $resp->status());
                    }
                } catch (\Throwable $e) {
                    Log::error('NewsData exception: ' . $e->getMessage());
                }
            }

            // ---------- 3) GNews (jika ada key) ----------
            if (!empty($gnewsKey)) {
                try {
                    $resp = Http::get('https://gnews.io/api/v4/search', [
                        'q'     => $keywords,
                        'token' => $gnewsKey,
                        'lang'  => 'en',
                        'max'   => 10,
                    ]);

                    if ($resp->ok()) {
                        $body = $resp->json();
                        $items = $body['articles'] ?? [];
                        foreach ($items as $it) {
                            $collected[] = [
                                'title'       => $it['title'] ?? '',
                                'description' => $it['description'] ?? '',
                                'url'         => $it['url'] ?? '#',
                                'source'      => $it['source']['name'] ?? ($it['source'] ?? 'GNews'),
                                'publishedAt' => $it['publishedAt'] ?? ($it['published_at'] ?? Carbon::now()->toIso8601String()),
                                'urlToImage'  => $it['image'] ?? null,
                            ];
                        }
                    } else {
                        Log::warning('GNews returned non-ok status: ' . $resp->status());
                    }
                } catch (\Throwable $e) {
                    Log::error('GNews exception: ' . $e->getMessage());
                }
            }

            // ---------- fallback: Hacker News (no key) sebagai sumber tech if collected empty ----------
            if (empty($collected)) {
                try {
                    $resp = Http::get('https://hn.algolia.com/api/v1/search_by_date', [
                        'query' => $keywords,
                        'tags'  => 'story',
                        'hitsPerPage' => 10,
                    ]);
                    if ($resp->ok()) {
                        $items = $resp->json('hits') ?? [];
                        foreach ($items as $it) {
                            $collected[] = [
                                'title'       => $it['title'] ?? ($it['story_title'] ?? 'Hacker News'),
                                'description' => $it['story_text'] ?? '',
                                'url'         => $it['url'] ?? ('https://news.ycombinator.com/item?id=' . ($it['objectID'] ?? '')),
                                'source'      => 'Hacker News',
                                'publishedAt' => $it['created_at'] ?? Carbon::now()->toIso8601String(),
                                'urlToImage'  => null,
                            ];
                        }
                    }
                } catch (\Throwable $e) {
                    Log::error('HN fallback exception: ' . $e->getMessage());
                }
            }

            // ---------- Deduplicate by URL and normalize published format ----------
            $unique = [];
            foreach ($collected as $c) {
                $key = trim($c['url'] ?? '');
                if (empty($key)) {
                    // if no url then generate key from title
                    $key = 'no-url-' . md5($c['title'] ?? json_encode($c));
                }
                if (!isset($unique[$key])) {
                    // ensure publishedAt iso string
                    $published = $c['publishedAt'] ?? null;
                    try {
                        $publishedIso = $published ? Carbon::parse($published)->toIso8601String() : Carbon::now()->toIso8601String();
                    } catch (\Throwable $e) {
                        $publishedIso = Carbon::now()->toIso8601String();
                    }

                    $unique[$key] = [
                        'title'       => $c['title'] ?? '',
                        'description' => $c['description'] ?? '',
                        'url'         => $c['url'] ?? '#',
                        'source'      => $c['source'] ?? '',
                        'publishedAt' => $publishedIso,
                        'urlToImage'  => $c['urlToImage'] ?? null,
                    ];
                }
            }

            // Sort by publishedAt desc
            $results = array_values($unique);
            usort($results, function ($a, $b) {
                return strtotime($b['publishedAt']) <=> strtotime($a['publishedAt']);
            });

            return $results;
        });

        // logging short info
        Log::info('AINews - fetched articles: ' . count($articles) . ' for keywords: ' . $keywords);

        return view('ai-news.index', [
            'title'    => 'AI News Portal',
            'keywords' => $keywords,
            'articles' => $articles,
        ]);
    }
}
