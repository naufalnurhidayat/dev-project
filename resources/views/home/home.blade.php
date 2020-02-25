@extends('templates.template-home')

@section('title', 'Home')

@section('content')

<div class="container">
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <a href="{{url('/')}}" class="h5 mb-0 font-weight-bold text-gray-800">Home</a>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-home fa-2x text-red-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <a href="{{url('/absen')}}" class="h5 mb-0 font-weight-bold text-gray-800">Absen</a>
                        </div>
                        <div class="col-auto">
                        <i class="far fa-clipboard fa-2x text-red-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <a href="/cuti" class="h5 mb-0 font-weight-bold text-gray-800">Cuti</a>
                        </div>
                        <div class="col-auto">
                        <i class="far fa-calendar-minus fa-2x text-red-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <a href="{{url('/invetaris')}}" class="h5 mb-0 font-weight-bold text-gray-800">Inventori</a>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-red-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-3">
        <div class="col">
            <div class="jumbotron mx-auto text-center">
<<<<<<< HEAD
            <h1 class="display-3">{{auth()->user()->nama}}</h1>  
=======
                <h1 class="display-3">Hallo, {{ auth()->user()->nama }}!</h1>  
>>>>>>> 28f0bf0b7be91a54cc1eec2375dfdd554d96377b
                <p class="lead">Selamat datang di (Divisi Digital Service) PT Telekomunikasi Indonesia</p>
                <hr class="my-4">
                <p>Terima kasih telah menggunakan layanan kami.</p>
                <a class="btn btn-danger btn-lg" href="" role="button" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModal">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        {{-- Form Input --}}
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="{{ url('/logout') }}" method="GET">
            @csrf
            <button class="btn btn-primary">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection
