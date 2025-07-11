<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">

    @php
        /* @var $posts \App\Models\Post[] */
    @endphp

    <url>
        <loc>https://{{ $_SERVER['HTTP_HOST'] }}</loc>
        <lastmod>2022-07-29</lastmod>
        <priority>1</priority>
    </url>

    @if($posts)

        @foreach($posts as $post)

            <url>
                <loc>https://{{ $_SERVER['HTTP_HOST'] }}/post/{{ $post->url }}</loc>
                <lastmod>{{ \Carbon\Carbon::parse($post->updated_at )->toDateString()}}</lastmod>
                <priority>0.9</priority>
            </url>

        @endforeach

    @endif

    @foreach($data as $dataItem)
        @foreach($dataItem as $item)
            @if(isset($item->filter_url))
                <url>
                    <loc>https://{{ $_SERVER['HTTP_HOST'] }}/{{ $item->filter_url }}</loc>
                    <lastmod>2022-07-29</lastmod>
                    <priority>0.9</priority>
                </url>
            @endif
        @endforeach
    @endforeach

</urlset>
