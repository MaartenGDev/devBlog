<?php

namespace App\Http\Controllers;

use App\Post;

use Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::with('user')->get(),
            'containerClass' => 'overflow-card'
        ]);
    }

    public function show($slug)
    {
        $post = Post::findBySlug($slug);

        if (is_null($post)) {
            throw new NotFoundHttpException;
        }

        return view('post.view', [
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $thumbnail = '';

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:5',
        ]);

        if($request->hasFile('thumbnailImage')){
            $file = $request->file('thumbnailImage');
            $name = md5(microtime() . $file->getClientOriginalName());

            $fileName = $file->move(storage_path('app/public') . '/images/', $name);

            $thumbnail = '/images/' . $name . '.jpg';
        }

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
            'thumbnail' => $thumbnail
        ]);

        return redirect('/dashboard')
            ->with('status', 'Post has been created!');
    }

    public function patch(Post $post, Request $request)
    {
        $this->authorize('update', $post);

        if($request->hasFile('thumbnailImage')){
            $file = $request->file('thumbnailImage');
            $name = md5(microtime() . $file->getClientOriginalName());

            $file->move(storage_path('app/public') . '/images/', $name . '.jpg');

            $thumbnail = '/images/' . $name . '.jpg';

            $request->request->add(['thumbnail' => $thumbnail]);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect('/dashboard')
                ->withInput()
                ->withErrors($validator);
        }




        $post->update($request->all());

        return redirect('/dashboard')
            ->with('status', 'The post has been successfully updated!');
    }


    public function delete(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect('/dashboard')
            ->with('status', 'The post has been removed!');
    }
}
