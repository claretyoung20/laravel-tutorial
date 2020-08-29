<?php

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
    return view('static-pages.aboutus');
});



Route::get('/post/{post}', 'PostController@show');

Route::get('/user/{user}', 'UserController@show');
