@extends('layout.template.dashboard')

@section('title-tab', 'LifeGuidance')

@section('admin_content')
<div class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
      <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            @if (Auth::guard('siswa')->user()->avatar)
              <img src="{{ Auth::user()->avatar }}" alt="Avatar" class="w-100 mt-5 border-radius-lg shadow-sm">
            @else  
              <img src="{{ asset('foto_gurubk/None.png') }}" alt="Avatar" class="w-100 mt-5 border-radius-lg shadow-sm">
            @endif
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{ Auth::guard('siswa')->user()->name }}
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              {{ Auth::guard('siswa')->user()->role->name }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-xl-4 ml-5 container-fluid" style="width: 100%;">
    <div class="card h-100 mt-5">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-md-8 d-flex align-items-center">
            <h6 class="mb-0">Informasi Profil</h6>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <p class="text-sm">
          {{ Auth::guard('siswa')->user()->motto }}
        </p>
        <hr class="horizontal gray-light my-4">
        <ul class="list-group">
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ Auth::guard('siswa')->user()->email }}</li>
          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; Indonesia, Jawa Barat, Kota Depok</li>
          <li class="list-group-item border-0 ps-0 pb-0">
            <strong class="text-dark text-sm">Hubungkan Dengan Gmail:</strong> &nbsp;
            <a class="btn btn-google btn-simple mb-0 ps-1 pe-2 py-0" href="{{ route('login.google') }}">
              <i class="fab fa-google fa-lg"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection
