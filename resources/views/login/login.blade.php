@extends('templates.template-dasar')

@section('title', 'Login')

@section('content')

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col">
        <div class="p-5">
          <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Login</h1>
          </div>
          <form action="" method="POST">
            <div class="form-group">
              <input type="email" class="form-control form-control-user" id="email" placeholder="Email" name="email">
            </div>
            <div class="form-group row">
              <div class="col mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
              </div>
            </div>
            <a href="" class="btn btn-primary btn-user btn-block">
              Login
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

@endsection