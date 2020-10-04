@extends('layout.layout')

@section('content')

    <div class="actions-read-more" style="padding-top: 50px;">
        <a href="/articles/{{$article->id}}/edit" class="button alt" style="color: white !important; background-color: green !important;">Edit Article</a>
    </div>

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
