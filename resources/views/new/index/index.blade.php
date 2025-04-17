@extends('new.layouts.main')
@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif

@if(isset($webmaster) and $webmaster)
    @section('webmaster', $webmaster['tag'])
@endif

@section('content')

    @if(isset($productMicro))
        {!! $productMicro !!}
    @endif

    @if(isset($serviceMicro))
        {!! $serviceMicro !!}
    @endif

    @if(isset($webSiteMicro))
        {!! $webSiteMicro !!}
    @endif

    @include('new.include.filter')

    <div class="row">
        <div class="col-12">
            <div class="h1_sort d-flex">
                <h1 class="big-red-text">{{ $meta['h1'] }}</h1>
                <div class="sort custom-select">
                    <select class="metro-select" name="limit" id="sort-select" onchange="setSort()">
                        <option @if($sort == 'default') selected @endif value="default">Сортировать</option>
                        <option @if($sort == 'price_asc') selected @endif value="price_asc">От дешевых к дорогим</option>
                        <option @if($sort == 'price_desc') selected @endif value="price_desc">От дорогих к дешевым</option>
                    </select>
                </div>
            </div>

            <p class="small-black-text">
                @if(isset($text->small_text) and $text->small_text)
                    {{ $text->small_text }}
                @endif
            </p>
        </div>
    </div>
    <div class="row posts">

        @php
            $i = 0;
            $review = false;
        @endphp

        @if($posts)
            @foreach($posts as $post)
                @include('new.include.item')
                @php
                    $i ++;
                    if ($post->reviews->first()){
                        $review = true;
                    }
                @endphp
            @endforeach
        @endif

    </div>

    @if($posts and $posts->total() > $posts->count())

        <div data-url="{{ str_replace('http', 'https', $posts->nextPageUrl()) }}" onclick="getMorePosts(this)"
             class="more-posts-btn">Показать еще
        </div>

        {!! str_replace('http', 'https', $posts->links('vendor.pagination.bootstrap-4')) !!}
    @endif

    @if($review)
        <div class="page-review row">

            <p class="col-12 big-red-text">Отзывы о {{ $meta['h1'] }}</p>

            @foreach($posts as $post)

                @if($post->reviews->first())

                    @foreach($post->reviews as $item)

                        @include('new.include.page-review')

                    @endforeach

                @endif

            @endforeach

        </div>
    @endif

    @if(isset($text->text) and $text->text)
        <div class="text">
            {!! $text->text !!}
        </div>
    @endif

    @include('new.include.main-menu', compact('data'))

@endsection

@section('open-graph')
    @include('new.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/images/logo.svg'])
@endsection
