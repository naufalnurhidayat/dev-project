@extends('templates.template')

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
                        <a href="/" class="h5 mb-0 font-weight-bold text-gray-800">Home</a>
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
                        <a href="#" class="h5 mb-0 font-weight-bold text-gray-800">Absen</a>
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
                        <a href="#" class="h5 mb-0 font-weight-bold text-gray-800">Cuti</a>
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
                        <a href="#" class="h5 mb-0 font-weight-bold text-gray-800">Inventori</a>
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
                <h1 class="display-3">Hallo, Nama User!</h1>
                <p class="lead">Selamat datang di (Divisi Digital Service) PT Telekomunikasi Indonesia</p>
                <hr class="my-4">
                <p>Terima kasih telah menggunakan layanan kami.</p>
                <a class="btn btn-danger btn-lg" href="#" role="button">Logout</a>
            </div>
        </div>
    </div>
</div>


@endsection