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
    <form role="form" class="mb-4" action="{{ route('login_admin_action') }}" method="POST">
        @csrf
        <label>Email</label>
        <div class="mb-2">
            <input type="email" autocomplete="off" class="form-control" placeholder="Email" aria-label="Email"
                aria-describedby="email-addon" name="email">
        </div>
        <label>Password</label>
        <div class="mb-4">
            <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                aria-describedby="password-addon" name="password">
        </div>
        @if (Session::has('status'))
                <button type="button" disabled  class="btn bg-gradient-danger w-100">{{ Session::get('message') }}</button>
        @endif
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
        </div>
    </form>
@endsection
