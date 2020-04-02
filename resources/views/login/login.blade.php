@extends('templates.template-dasar')

@section('title', 'Login')

@section('content')

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
  <div class="card-body p-0">
    @if(session('status'))
      <div class="alert alert-success mt-2">
        {{ session('status') }}
      </div>
    @endif
    @if(session('danger'))
      <div class="alert alert-danger mt-2">
        {{ session('danger') }}
      </div>
    @endif
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col">
      @if (session('danger'))
        <div class="p-4">
      @else
        <div class="p-5">
      @endif
          <div class="text-center">
            <img src="{{ asset('img/logotelkom.jfif') }}" width="25%" class="mb-3 rounded">
            <h1 class="h4 text-gray-900 mb-4">Login</h1>
          </div>
          <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="form-group">
              <input type="email" class="form-control form-control-user" id="email" placeholder="Email" name="email" >
            </div>
            <div class="form-group row">
              <div class="col mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
              </div>
            </div>
            <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
              Login
            </button>
            <div class="text-center">
              <a href="{{ url('/registrasi') }}">Create an account</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

@endsection