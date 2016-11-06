<?php
namespace App\Http\Controllers;

use App\Post;

class DashboardController extends Controller
{
    protected $posts;

    public function index()
    {
        return view('dashboard.index', array('posts' => Post::all()));
    }

    public function showCreateForm()
    {
        return view('post.create');
    }

    public function showEditForm(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }
}
