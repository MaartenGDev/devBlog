@extends('layouts.app')

@section('content')
    <div class="md-card">
        <form method="POST" action="{{ url('/register') }}">
            <div class="group">
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Name</label>
            </div>
            <div class="group">
                <input type="email" class="form-control" name="email" value="{{old('email')}}">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Email</label>
            </div>
            <div class="group">
                <input type="password" class="form-control" name="password">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Password</label>
            </div>
            <div class="group">
                <input type="password" class="form-control" name="password_confirmation">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Password Again</label>
            </div>
            <button class="btn btn-default btn-margin" type="submit">Send</button>
            {{ csrf_field() }}
        </form>
    </div>
@endsection
