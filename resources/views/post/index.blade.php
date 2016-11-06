@extends('layouts.app')
@section('content')
    @foreach ($posts as $post)
        <article class="card post-list__item">
            <h3 class="post-list__item__title">{{$post->title}}</h3>

            <p class="post-list__item__details">
                <span class=""><i class="fa fa-user" aria-hidden="true"></i> By: {{$post->user->name}} </span>
                <span><i class="fa fa-clock-o post-time" aria-hidden="true"></i>{{$post->updated_at}}</span>
            </p>
            <section class="post-list__description">
                <p class="post-content">{!! $post->preview !!}</p>
                <a href="/posts/{{$post->slug}}" class="btn btn-default read-more">READ MORE</a>
            </section>
        </article>
    @endforeach
@endsection
