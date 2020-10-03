@extends('layout.layout')

@section('content')

    <section id="one" style="width: 60%">
            <div class="inner" style="padding-top: 30px">
                <header>
                    <h2>{{ $article->title }}</h2>
                </header>
                <img src="/images/banner.jpg" width="100%">
                <p>{{ $article->body }}</p>

            </div>
    </section>

@endsection
