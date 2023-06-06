@extends('layout.template.login')
@section('title-tab')
    Login - LifeGuidance
@endsection
@section('title-navbar')
    LifeGuidance
@endsection
@section('form')
    <form role="form" class="mb-4" action="{{ route('login_admin_action') }}" method="POST">
        @csrf
        <label>Email</label>
        <div class="mb-2">
            <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email">
        </div>
        <label>Password</label>
        <div class="mb-4">
            <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                aria-describedby="password-addon" name="password">
        </div>
        {{-- <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div> --}}
        @if (Session::has('status'))
            <p>{{ Session::get('message') }}</p>
        @endif
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
        </div>
    </form>
@endsection
