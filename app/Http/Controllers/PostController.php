<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    public function index(){
        return view('blog.index', [
            'posts' => Post::allPosts(),
        ]);
    }
    public function show($slug){
        $post = Post::BlogPost()->slug($slug)->first();

        if(is_null($post)){
            throw new NotFoundHttpException;
        }

        return view('blog.post', [
            'post' => $post,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:5',
        ]);


        if ($validator->fails()) {
            return redirect('/dashboard')
                ->withInput()
                ->withErrors($validator);
        }

        $request->user()->posts()->create([
            'type' => 0,
            'slug' => str_slug($request->title),
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user()->id,
        ]);

        return redirect('/dashboard')
            ->with('status', 'Post has been created!');
    }

    public function patch(Post $post, Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect('/dashboard')
                ->withInput()
                ->withErrors($validator);
        }

        $this->authorize('update',$post);

        $post->update($request->all());

        return redirect('/dashboard')
            ->with('status', 'The post has been successfully updated!');
    }


    public function delete(Post $post)
    {

        $this->authorize('delete',$post);

        $post->delete();

        return redirect('/dashboard')
            ->with('status', 'The post has been removed!');
    }
}
