@extends('layout.layout')

@section('content')

    <section id="one" style="width: 60%">
        @foreach($articles as $article)
            <div class="inner" style="padding-top: 30px">
                <header>
                    <h2>{{ $article->title }}</h2>
                </header>
                <img src="/images/banner.jpg" width="100%">
                <p>{{ $article->excerpt }}</p>
            </div>
            <div class="actions-read-more">
                <a href="/articles/{{ $article->id }}" class="button alt">Read More</a>
            </div>
        @endforeach
    </section>

@endsection
