@extends('layouts.dashboard')

@section('content')
    <div class="md-card">
        <h2>Add Image</h2>
        <form class="editor" action="/dashboard/photos" method="POST" enctype="multipart/form-data">
            @if ($errors->has('title'))
                <strong>{{ $errors->first('title') }}</strong>
            @endif
            <div class="group post-input-title">
                <input type="text" name="name">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Title</label>
            </div>

            <input type="file" name="image">
            <button class="btn btn-default btn-margin">Save</button>
            {{ csrf_field() }}
        </form>
    </div>

@endsection
