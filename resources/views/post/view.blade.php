@extends('layouts.app')

@section('page-header')
    <header class="image-page-header">
        <section class="image-page-header-image">
            <img src="{{ $post->thumbnail }}"/>
        </section>
    </header>
@endsection

@section('content')
    <div class="md-card md-card-post">
        <h3 class="post-title">{{$post->title}}</h3>
        <p class="post-details"><i class="fa fa-user" aria-hidden="true"></i> By: {{$post->name}} <i
                    class="fa fa-clock-o post-time" aria-hidden="true"></i> {{$post->updated_at}}</p>
        <p class="post-content">@markdown($post->body)</p>
    </div>
@endsection
