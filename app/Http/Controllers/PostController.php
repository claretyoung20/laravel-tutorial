<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Post;


class PostController extends Controller
{

    public function show($slug) {

//        $post = DB::table('posts')->where('slug', $slug)->first();
//        $post = Post::where('slug', $slug)->firstOrFail();

//        if(!$post) {
//            abort(404, 'Post Not found');
//        }

        return view('post', [
            'post' =>  Post::where('slug', $slug)->firstOrFail()
        ]);

    }
}
