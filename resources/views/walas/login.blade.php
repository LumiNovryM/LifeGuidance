@extends('layout.template.login')
@section('title-tab')
    Login - LifeGuidance
@endsection
@section('title-navbar')
    LifeGuidance
@endsection
@section('name')
    Wali Kelas
@endsection
@section('form')
    <form method="post" action="{{ route('login_walas_action') }}" role="form" class="mb-4">
        @csrf
        <label>Email</label>
        <div class="mb-2">
            <input type="email" autocomplete="off" class="form-control" placeholder="Email" aria-label="Email"
                aria-describedby="email-addon" name="email"
                @if (isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @endif>
        </div>
        @error('email')
        <p style="color: red; font-size: 12px">*{{ $message }}</p>
    @enderror
        <label>Password</label>
        <div class="mb-4">
            <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password">
        </div>
        @error('password')
        <p style="color: red; font-size: 12px">*{{ $message }}</p>
    @enderror
       
    <div class="form-check form-switch">
        <input class="form-check-input" name="remember" type="checkbox" id="rememberMe"
        @if(isset($_COOKIE["email"]))                                         
            checked 
        @endif
        >
        <label class="form-check-label" for="rememberMe">Remember me</label>
    </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
        </div>
    </form>
@endsection
