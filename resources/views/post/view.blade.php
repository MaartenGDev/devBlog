@extends('layouts.app')

@section('page-header')
    <header class="image-page-header">
        <section class="image-page-header-image">
            <img src="{{ $post->thumbnail }}"/>
        </section>
    </header>
@endsection

@section('content')
    <article>
        <h1 class="post-title">{{$post->title}}</h1>
        <p class="post-details"><i class="fa fa-user" aria-hidden="true"></i> By: {{$post->user->name}} <i
                    class="fa fa-clock-o post-time" aria-hidden="true"></i> {{date('j F Y', strtotime($post->updated_at))}}</p>
        <section>
            <p class="post-content">@markdown($post->body)</p>
        </section>
    </article>
@endsection
