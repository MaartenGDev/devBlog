@section('assets')
    @parent
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simplemde.min.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/simplemde.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection

@extends('layouts.app')
@section('navigation')
    <li class="nav-item nav-left"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
@endsection
@section('content')
    @parent
@endsection