@extends('layout.layout')

@section('content')

    <section id="one" style="width: 60%">
            <div class="inner" style="padding-top: 30px">
                <header>
                    <h2>New Article</h2>
                </header>

                <form method="POST" action="/articles">
                    @csrf
                    <div class="field">
                        <label class="label" for="title">Title</label>

                        <div class="content">
                            <input class="input {{ $errors->has('title') ? 'is-danger-bg': ''}}"
                                   type="text" name="title" id="title" value="{{ old('title') }}">
                            @if($errors->has('title'))
                                <p class="is-danger"> {{ $errors->first('title')  }}</p>
                            @endif
                        </div>
                    </div>


                    <div class="field">
                        <label class="label" for="excerpt">Excerpt</label>

                        <div class="content">
                            <textarea class="textarea {{ $errors->has('excerpt') ? 'is-danger-bg': ''}}"
                                      name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>
                            @if($errors->has('excerpt'))
                                <p class="is-danger"> {{ $errors->first('excerpt')  }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="body">Body</label>

                        <div class="content">
                            <textarea class="textarea {{ $errors->has('body') ? 'is-danger-bg': ''}}"
                                      name="body" id="body">{{ old('body') }}</textarea>
                            @if($errors->has('body'))
                                <p class="is-danger"> {{ $errors->first('body')  }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="body">Tags</label>

                        <div class="content">
                            <select name="tags[]" multiple="multiple">

                                @foreach($tags as  $tag)
                                    <option value="{{ $tag->id }}"> {{ $tag->name }}</option>
                                @endforeach

                            </select>

                            @error('tags')
                            <p class="is-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <br><br>
                        <div class="content">
                            <button class="button" type="submit">Submit</button>
                        </div>
                    </div>

                </form>

            </div>
    </section>

@endsection
