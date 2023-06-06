@extends('layout.template.login')
@section('title-tab')
    Login - LifeGuidance
@endsection
@section('title-navbar')
    LifeGuidance
@endsection
@section('name')
    Guru
@endsection
@section('form')
    <form role="form" class="mb-4" method="POST" action="{{ route('login_guru_action') }}">
        @csrf
        <label>Email</label>
        <div class="mb-2">
            <input type="email" class="form-control" autocomplete="off" name="email"  placeholder="Email" aria-label="Email" aria-describedby="email-addon" 
            @if(isset($_COOKIE["email"]))                                         
                value="{{ $_COOKIE["email"] }}" 
            @endif
            >
        </div>
        <label>Password</label>
        <div class="mb-4">
            <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Password"
                aria-describedby="password-addon">
        </div>
       
        <div class="form-check form-switch">
            <input class="form-check-input" name="remember" type="checkbox" id="rememberMe"
            @if(isset($_COOKIE["email"]) && $_COOKIE["special_code"] === )                                         
                checked 
            @endif
            >
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        @if (Session::has('status'))
                <button type="button" disabled  class="btn bg-gradient-danger w-100">{{ Session::get('message') }}</button>
        @endif
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
        </div>
    </form>
@endsection
