@extends('layout.template.login')
@section('title-tab')
    Login - LifeGuidance
@endsection
@section('title-navbar')
    LifeGuidance
@endsection
@section('name')
    Siswa
@endsection
@section('form')
    <form role="form"  action="{{ route('login_siswa_action') }}" method="POST" class="mb-4">
        @csrf
        <label>Email</label>
        <div class="mb-2">
            <input type="email" class="form-control" autocomplete="off" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email">
        </div>
        @error('email')
        <p style="color: red; font-size: 12px">*{{ $message }}</p>
    @enderror
        <label>Password</label>
        <div class="mb-4">
            <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password"
                aria-describedby="password-addon">
        </div>
        @error('password')
        <p style="color: red; font-size: 12px">*{{ $message }}</p>
    @enderror
       
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
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
