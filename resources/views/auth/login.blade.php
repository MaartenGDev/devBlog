@extends('layouts.app')

@section('content')
    <div class="md-card">
        <form method="POST" action="{{ url('/login') }}">
            <div class="group">
                <input type="email" name="email" value="{{ old('email') }}">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Email</label>
            </div>
            <div class="group">
                <input type="password" name="password">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Password</label>
            </div>
           <p><a class="link" href="{{ url('/password/reset') }}">Forgot Your Password?</a></p>
            <button class="btn btn-default btn-margin">Send</button>
            {{ csrf_field() }}
        </form>
    </div>
@endsection
