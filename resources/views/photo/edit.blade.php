@extends('layouts.dashboard')

@section('content')
    <div class="md-card photo-card">
        <h2>Update Photo</h2>
        <form class="editor" action="/dashboard/photos/{{$photo->id}}" method="POST" enctype="multipart/form-data">
            <div class="group post__input-title">
                <input type="text" name="name" value="{{ $photo->name }}">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Title</label>
            </div>

            <p>Old Photo</p>
            <section class="photo-preview">
            <img src="{{ $photo->url }}"/>
            </section>

            <p>New Photo</p>
            <input type="file" name="image">
            <button class="btn btn-default btn-margin">Save</button>
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
        </form>
    </div>

@endsection
