@extends('layout.template.siswa_dashboard')

@section('title-tab', 'LifeGuidance')

@section('siswa_content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Siswa Terdaftar</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $siswa }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa-solid fa-users" style="color: #ffffff;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Guru BK</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $guru }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa-solid fa-person-chalkboard" style="color: #ffffff;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Kelas</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $kelas }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa-solid fa-school" style="color: #ffffff;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Wali Kelas</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $walas }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa-solid fa-person-chalkboard" style="color: #ffffff;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <h5 class="font-weight-bolder">LifeGuidance</h5>
                                    <p class="mb-2 text-justify">LifeGuidance adalah sebuah aplikasi bimbingan konseling
                                        sekolah yang menggabungkan kata "Life" dan "Guidance". Nama ini memiliki makna
                                        singkat yaitu memberikan panduan dalam kehidupan sehari-hari, terutama dalam konteks
                                        bimbingan konseling sekolah.</p>
                                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                        href="javascript:;">
                                        Read More
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                <div class="bg-gradient-primary border-radius-lg h-100">
                                    <img src="../assets/img/shapes/waves-white.svg"
                                        class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                        <img class="w-100 position-relative z-index-2 pt-4"
                                            src="../assets/img/illustrations/rocket-white.png" alt="rocket">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card h-100 p-3">
                    <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
                        style="background-image: url('../assets/img/ivancik.jpg');">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                            <h5 class="text-white font-weight-bolder mb-4 pt-2">LifeGuidance</h5>
                            <p class="text-white">Temukan potensi terbaikmu dengan LifeGuidance! Aplikasi inovatif kami
                                memberikan bimbingan pribadi yang tepat, membantu siswa meraih sukses di sekolah dan
                                kehidupan. Dapatkan nasihat ahli, atasi tantangan, dan jelajahi peluang baru.</p>
                            {{-- <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                                Read More
                                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
          <div class="col-12">
              <div class="card mb-4">
                  <div class="card-header pb-0">
                      <h6>Active User</h6>
                  </div>
                  <div class="card-body px-0 pt-0">
                      <div class="table-responsive p-0">
                          
                          <table class="table align-items-center mb-0">
                              <thead>
                                  <tr>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                      </th>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email
                                      </th>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Seen</th>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                @if ($online_user->isNotEmpty())
                                
                                @forelse ($online_user as $user)
                                        @if (Cache::has('user-is-online-'.$user->name))
                                        <tr>
                                            <td>
                                                <div class="ms-3 text-secondary">
                                                    <p class="text-secondary">{{ $loop->iteration }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-secondary">
                                                    <p class="text-secondary">{{ $user->name }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-secondary">
                                                    <p class="text-secondary">{{ $user->email }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-secondary">
                                                    <p class="text-secondary">{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</p>
                                                </div>
                                            </td>
                                            <td>
                                              @if (Cache::has('user-is-online-'.$user->name))
                                                  <div class="text-secondary">
                                                      <p style="color:green;">Online</p>
                                                  </div>
                                              @else
                                                  <div class="text-secondary">
                                                      <p style="color:red;">Offline</p>
                                                  </div>
                                              @endif
                                            </td>
                                        </tr>
                                        @endif
                                @empty
                                <tr>
                                     <td colspan="5">
                                         <div class="text-secondary d-flex justify-content-center py-lg-3">
                                             <p class="text-secondary">Table Kosong</p>
                                         </div>
                                     </td>
                                </tr>
                                @endforelse
                            @endif
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="{{ route('dashboard') }}" class="font-weight-bold" target="_blank">LifeGuidance</a>
                            for a better life.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script>
        @if (session('message'))
            toastr.options = {
                "positionClass": "toast-top-right",
                "timeOut": 4000,
                "toastClass": "toast-primary",
            };

            toastr.success('{{ session('message') }}');
        @endif
    </script>
@endsection
