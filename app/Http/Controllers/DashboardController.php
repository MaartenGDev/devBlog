<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    protected $posts;

    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    public function index()
    {
        return view('dashboard.index', array('posts' => Post::all()));
    }

    public function showCreateForm()
    {
        return view('dashboard.create');
    }

    public function showEditForm(Post $post)
    {
        return view('dashboard.edit', ['post' => $post]);
    }

    public function create(Request $request)
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
            'user_id' => Auth::User()->id,
        ]);

        return redirect('/dashboard')->with('status', 'Post has been created!');
    }

    public function patch(Post $post, Request $request)
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


        $post->update([
            'slug' => str_slug($request->title),
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect('/dashboard')->with('status', 'The post has been successfully updated!');
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/dashboard')->with('status', 'The post has been removed!');
    }
}
