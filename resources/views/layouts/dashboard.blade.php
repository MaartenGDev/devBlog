@section('assets')
    @parent
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simplemde.min.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    @parent
@endsection

@extends('layouts.app')
@section('navigation')
    <li class="nav-item nav-left"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="nav-item nav-left"><a href="{{ url('/dashboard/posts') }}">Posts</a></li>
    <li class="nav-item nav-left"><a href="{{ url('/dashboard/photos') }}">Photos</a></li>
@endsection
@section('content')
    @parent
@endsection