<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(Request $request)
    {
        $photos = Photo::all();

        return view('photo.index', [
            'photos' => $photos,
            'containerClass' => 'overflow-card'
        ]);
    }

    public function create(Request $request)
    {
        return view('photo.create', [
            'containerClass' => 'overflow-card'
        ]);
    }

    public function view(Photo $photo)
    {
        $this->authorize('view', $photo);

        return view('photo.view', [
            'photo' => $photo,
            'containerClass' => 'overflow-card'
        ]);
    }

    public function edit(Photo $photo)
    {
        $this->authorize('edit', $photo);


        return view('photo.edit', [
            'photo' => $photo,
            'containerClass' => 'overflow-card'
        ]);
    }

    public function patch(Request $request, Photo $photo)
    {
        $this->authorize('update', $photo);

        $file = $request->file('image');
        $name = md5(microtime() . $file->getClientOriginalName());
        $file->move(storage_path('app/public') . '/images/', $name . '.jpg');
        $fileName = '/images/' . $name . '.jpg';

        $photo->update([
            'name' => $request->name,
            'url' => $fileName
        ]);

        return redirect('/dashboard/photos')
            ->with('status', 'The photo has been updated!');
    }

    public function store(Request $request)
    {
        $file = $request->file('image');

        $name = md5(microtime() . $file->getClientOriginalName());

        $file->move(storage_path('app/public') . '/images/', $name . '.jpg');

        $fileName = '/images/' . $name . '.jpg';

        $request->user()->photos()->create([
            'name' => $request->name,
            'url' => $fileName
        ]);

        return redirect('/dashboard/photos')
            ->with('status', 'The photo has been created!');
    }

    public function delete(Photo $photo)
    {
        $this->authorize('delete', $photo);

        $photo->delete();

        return redirect('/dashboard/photos')
            ->with('status', 'The photo has been removed!');
    }
}
