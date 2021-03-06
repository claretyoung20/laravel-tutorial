@extends('layout.layout')

@section('content')

    <section id="one">
        @foreach($articles as $article)
            <div class="inner">
                <header>
                    <h2>{{ $article->title }}</h2>
                </header>
                <p>{{ $article->excerpt }}</p>

            </div>

            <div class="actions-read-more">
                <a href="/articles/{{ $article->id }}" class="button alt">Read More</a>
            </div>
        @endforeach
    </section>

@endsection
