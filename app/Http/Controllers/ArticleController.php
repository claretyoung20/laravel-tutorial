<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('static-pages.articles', [ 'articles' => Article::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('static-pages.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        Article::create($this->getValidateData($request));

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
        return view('static-pages.articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Application|Factory|Response|View
     */
    public function edit(Article $article)
    {
        return view('static-pages.articles.edit', [
            'article' => $article
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
        $article->update($this->getValidateData($request));

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
            'body' => 'required'
        ]);
    }
}
