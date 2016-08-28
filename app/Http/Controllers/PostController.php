<?php

namespace App\Http\Controllers;

use App\Post;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    public function index(){
        $posts = DB::table('posts')->leftJoin('users', 'users.id', '=', 'posts.user_id')->where('type', 0)->orderBy('posts.created_at', 'asc')->get();
        return view('blog.index', [
            'posts' => $posts,
        ]);
    }
    public function show($slug){
        $post = DB::table('posts')->leftJoin('users', 'users.id', '=', 'posts.user_id')->where('type', 0)->orderBy('posts.created_at', 'asc')->where(array('slug' => $slug))->get();

        if(count($post) == 1){
            $post = $post[0];
        }else{
            throw new NotFoundHttpException;
        }
        return view('blog.post', [
            'post' => $post,
        ]);
    }
}
