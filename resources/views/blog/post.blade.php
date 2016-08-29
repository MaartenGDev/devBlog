@extends('layouts.app')
@section('content')
        <div class="md-card md-card-nav">
            <p>Back to <a href="/">home</a> </p>
        </div>
        <div class="md-card md-card-post">
            <h3 class="post-title">{{$post->title}}</h3>
            <p class="post-details"><i class="fa fa-user" aria-hidden="true"></i> By: {{$post->name}} <i class="fa fa-clock-o post-time" aria-hidden="true"></i> {{$post->updated_at}}</p>
            <p class="post-content">@markdown($post->body)</p>
        </div>
@endsection
