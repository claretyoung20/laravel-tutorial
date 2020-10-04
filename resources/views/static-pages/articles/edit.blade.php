@extends('layout.layout')

@section('content')

    <section id="one" style="width: 60%">
            <div class="inner" style="padding-top: 30px">
                <header>
                    <h2>Edit Article</h2>
                </header>

                <form method="POST" action="/articles/{{$article->id}}">
                    @csrf
                    @method('PUT')
                    <div class="field">
                        <label class="label" for="title">Title</label>

                        <div class="content">
                            <input class="input" type="text" name="title" id="title" value="{{ $article->title }}">
                        </div>
                    </div>


                    <div class="field">
                        <label class="label" for="excerpt">Excerpt</label>

                        <div class="content">
                            <textarea class="textarea"  name="excerpt" id="excerpt">{{ $article->excerpt }}</textarea>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="body">Body</label>

                        <div class="content">
                            <textarea class="textarea"  name="body" id="body">{{ $article->body }}</textarea>
                        </div>
                    </div>

                    <div class="field">
                        <br><br>
                        <div class="content">
                            <button class="button" type="submit">Edit</button>
                        </div>
                    </div>

                </form>

            </div>
    </section>

@endsection
