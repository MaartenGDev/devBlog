@extends('layouts.dashboard')

@section('content')
    <div class="md-card photo-card">
        <h2>{{$photo->name}}</h2>
        <p>Url: <a target="_blank" href="{{ $photo->url }}">{{ $photo->url }}</a></p>
        <section class="photo-preview">
            <img src="{{ $photo->url }}"/>
        </section>
    </div>

@endsection
