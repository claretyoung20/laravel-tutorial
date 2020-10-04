<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('static-pages.welcome');
});

Route::get('/contact-us', function () {
    return view('static-pages.contactus');
});

Route::get('/about-us', function () {
    return view('static-pages.aboutus',[
        'articles' =>App\Article::take(3)->latest()->get()
    ]);
});

Route::get('/post/{post}', 'PostController@show');
Route::get('/user/{user}', 'UserController@show');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::post('/articles', [ArticleController::class, 'store']);
Route::get('/articles/create', [ArticleController::class, 'create']);
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit']);
Route::put('/articles/{article}', [ArticleController::class, 'update']);
Route::get('/articles/{article}/delete', [ArticleController::class, 'destroy']);
