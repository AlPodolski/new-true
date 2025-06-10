@extends('new.layouts.main')
@section('title', $meta['title'])
@section('des', $meta['des'])

@if(isset($path) and $path)
    @section('can', $path)
@endif

@if(isset($webmaster) and $webmaster)
    @section('webmaster', $webmaster['tag'])
@endif

@section('filter')
 @include('new.include.filter')
@endsection


@section('location_metro')
    @include('new.include.location_metro')
@endsection

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

    <div class="row content">
        @foreach($posts as $post)
            @include('new.include.item')
        @endforeach
    </div>

    @if($posts and $posts->total() > $posts->count())

        <div data-url="{{ str_replace('http', 'https', $posts->nextPageUrl()) }}" onclick="getMorePosts(this)"
             class="more-posts">Показать еще
        </div>

        {!! str_replace('http', 'https', $posts->links('vendor.pagination.bootstrap-4')) !!}
    @endif

@endsection

@section('open-graph')
    @include('new.include.open-graph', ['title' => $meta['title'], 'des' => $meta['des'], 'image' => '/images/logo.svg'])
@endsection
