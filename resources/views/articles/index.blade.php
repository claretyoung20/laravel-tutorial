@extends('layout.layout')

@section('content')

    <div class="actions-read-more" style="padding-top: 50px;">
        <a href="/articles/create" class="button alt" style="color: white !important; background-color: green !important;">Create New Article</a>
    </div>
    <section id="one" style="width: 60%">
        @forelse($articles as $article)
            <div class="inner" style="padding-top: 30px">
                <header>
                    <h2>{{ $article->title }}</h2>
                </header>
                <img src="/images/banner.jpg" width="100%">
                <p>{{ $article->excerpt }}</p>
            </div>
            <div class="actions-read-more">
                <a href="{{route('articles.show', $article)}}" class="button alt">Read More</a>
            </div>
        @empty
            <p>No Article available</p>
        @endforelse
    </section>

@endsection
