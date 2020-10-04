<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use function GuzzleHttp\Promise\all;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        if(\request('tag')) {
            $articles = Tag::where('name', \request('tag'))->firstOrFail()->articles;
            return view('articles.index', [ 'articles' => $articles]);
        }
        return view('articles.index', [ 'articles' => Article::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {

        $this->getValidateData($request);
        $article =  new Article(\request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();

        $article->tags()->attach(\request('tags'));

        return  redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Application|Factory|Response|View
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Application|Factory|Response|View
     */
    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article,
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Article $article
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, Article $article)
    {

        $this->getValidateData($request);
        $article->update(\request(['title', 'excerpt', 'body']));
        $tags = $article->tags();

        foreach ($tags->get() as $tag) {
            $article->tags()->detach($tag);
        }
        $article->tags()->attach(\request('tags'));

        return  redirect($article->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return  redirect('/articles/');
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getValidateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'min:3', 'max:50'],
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
