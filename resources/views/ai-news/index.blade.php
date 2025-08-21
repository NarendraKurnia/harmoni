@include('layout.head')
@include('layout.header')

<div class="container py-4">
    <h2 class="mb-4">{{ $title ?? 'AI News' }}</h2>

    {{-- Debug JSON --}}
    <details style="margin-bottom:12px;">
      <summary>Debug: show articles JSON (click)</summary>
      <pre style="white-space:pre-wrap; background:#f7f7f7; padding:12px; border-radius:6px;">
{!! json_encode($articles, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
      </pre>
    </details>

    {{-- Normalisasi seperti di atas --}}
    @php
        $normalized = [];
        if (!empty($articles) && is_array($articles)) {
            foreach ($articles as $a) {
                if (isset($a['title']) && isset($a['url'])) {
                    $title = $a['title'] ?? '';
                    $url = $a['url'] ?? '#';
                    $source = is_array($a['source']) ? ($a['source']['name'] ?? '') : ($a['source'] ?? '');
                    $published = $a['publishedAt'] ?? ($a['published_at'] ?? null);
                    $image = $a['urlToImage'] ?? ($a['image'] ?? null);
                    $description = $a['description'] ?? ($a['abstract'] ?? '');
                } else {
                    $title = $a['webTitle'] ?? $a['headline']['main'] ?? ($a['title'] ?? '');
                    $url = $a['webUrl'] ?? $a['web_url'] ?? ($a['url'] ?? '#');
                    if (isset($a['source']) && is_array($a['source'])) {
                        $source = $a['source']['name'] ?? '';
                    } elseif (isset($a['sectionName'])) {
                        $source = $a['sectionName'];
                    } else {
                        $source = $a['source'] ?? '';
                    }
                    $published = $a['webPublicationDate'] ?? $a['pub_date'] ?? ($a['publishedAt'] ?? null);
                    $image = $a['fields']['thumbnail'] ?? ($a['urlToImage'] ?? null);
                    $description = $a['fields']['trailText'] ?? ($a['abstract'] ?? ($a['description'] ?? ''));
                }

                $normalized[] = [
                    'title' => $title,
                    'url' => $url,
                    'source' => $source,
                    'published' => $published,
                    'image' => $image,
                    'description' => $description,
                ];
            }
        }
    @endphp

    @if(count($normalized) > 0)
        <div class="row">
            @foreach($normalized as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if(!empty($item['image']))
                            <img src="{{ $item['image'] }}" class="card-img-top" style="height:180px; object-fit:cover;" alt="thumb">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item['title'] ?: 'No title' }}</h5>
                            <p class="card-text" style="flex:1;">{{ \Illuminate\Support\Str::limit(strip_tags($item['description'] ?? ''), 140) }}</p>
                            <a href="{{ $item['url'] }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">Baca selengkapnya</a>
                        </div>
                        <div class="card-footer text-muted small">
                            {{ $item['source'] ?: 'Unknown' }} • 
                            {{ $item['published'] ? \Carbon\Carbon::parse($item['published'])->diffForHumans() : '' }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Tidak ada artikel ditemukan.</p>
    @endif
</div>

@include('layout.footer')
