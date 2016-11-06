@extends('layouts.app')

@section('page-header')
    <header class="image-page-header">
        <section class="image-page-header-image">
            <img src="{{ $post->thumbnail }}"/>
        </section>
    </header>
@endsection

@section('content')
    <article class="post-photo">
        <section class="post-photo__details">
            <h1 class="post-photo__title">{{$post->title}}</h1>
            <p class="post-photo__post-details">
                <span class="post-photo__detail"><i class="fa fa-user" aria-hidden="true"></i> By: {{$post->user->name}}</span>
                <span class="post-photo__detail post-photo__detail--last"><i class="fa fa-clock-o post-time" aria-hidden="true"></i> {{ date('j F Y', strtotime($post->updated_at)) }}</span>
            </p>
        </section>

        <section class="post-photo__body">
            <p class="post-content">@markdown($post->body)</p>
        </section>
    </article>
@endsection
