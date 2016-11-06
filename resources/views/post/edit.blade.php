@extends('layouts.dashboard')

@section('content')
    <div class="md-card">
        <h2>Edit Post</h2>
        <form action="/dashboard/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @if ($errors->has('title'))
                <strong>{{ $errors->first('title') }}</strong>
            @endif
            <div class="group post__input-title">
                <input type="text" name="title" value="{{$post->title}}">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Title</label>
            </div>
            @if ($errors->has('body'))
                <strong>{{ $errors->first('body') }}</strong>
            @endif

            <textarea class="editor" name="body" rows="10">{{ $post->body }}</textarea>

            <input type="file" name="thumbnailImage">
            <button class="btn btn-default btn-margin">Save</button>
            {{ method_field('PATCH') }}

            {{ csrf_field() }}
        </form>
    </div>
    <script src="{{ asset('js/simplemde.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
