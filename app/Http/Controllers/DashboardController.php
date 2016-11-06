<?php
namespace App\Http\Controllers;

use App\Post;

class DashboardController extends Controller
{
    protected $posts;

    public function index()
    {
        return view('dashboard.index', ['posts' => Post::all(), 'containerClass' => 'overflow-card']);
    }

    public function showCreateForm()
    {
        return view('post.create', ['containerClass' => 'overflow-card'
        ]);
    }

    public function showEditForm(Post $post)
    {
        return view('post.edit', ['post' => $post, 'containerClass' => 'overflow-card'
        ]);
    }
}
