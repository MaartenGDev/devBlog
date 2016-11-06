@extends('layouts.app')
@section('content')
    @foreach ($posts as $post)
        <div class="md-card md-card-post">
            <h3 class="post-title">{{$post->title}}</h3>
            <p class="post-details"><i class="fa fa-user" aria-hidden="true"></i> By: {{$post->user->name}} <i class="fa fa-clock-o post-time" aria-hidden="true"></i> {{$post->updated_at}}</p>
            <p class="post-content">{!! $post->preview !!}</p>
            <a href="/posts/{{$post->slug}}" class="btn btn-default read-more">READ MORE</a>
        </div>
    @endforeach
@endsection
