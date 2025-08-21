<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;


class AINewsController extends Controller
{
    public function index(Request $request)
    {
        $newsApiKey = env('NEWSAPI_KEY');
        $keywords = $request->get('q', 'artificial intelligence');

        $articles = [];

        if ($newsApiKey) {
            $response = Http::get('https://newsapi.org/v2/everything', [
                'q' => $keywords,
                'apiKey' => $newsApiKey,
                'pageSize' => 9,
                'language' => 'en',
                'sortBy' => 'publishedAt',
            ]);

            \Log::info('AINews status: '.$response->status());

            if ($response->ok()) {
                $newsApiArticles = $response->json('articles') ?? [];
                foreach ($newsApiArticles as $item) {
                    $articles[] = [
                        'title' => $item['title'] ?? '',
                        'description' => $item['description'] ?? '',
                        'url' => $item['url'] ?? '#',
                        'source' => $item['source']['name'] ?? 'NewsAPI',
                        'publishedAt' => $item['publishedAt'] ?? now()->toIso8601String(),
                        'urlToImage' => $item['urlToImage'] ?? null,
                    ];
                }
            } else {
                \Log::error('NewsAPI error: '.$response->body());
            }
        } else {
            \Log::warning('NEWSAPI_KEY is missing');
        }

        \Log::info('AI articles count: '.count($articles));

        return view('ai-news.index', [
            'title' => 'AI News Portal',
            'keywords' => $keywords,
            'articles' => $articles,
        ]);
    }
}
