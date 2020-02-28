@extends('templates/template-admin')

@section('title', '404 Not Found')

@section('content')
        <div class="container-fluid">

          <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800">Page Not Found</p>
            <a href="{{ url('/admin') }}">&larr; Back to Home</a>
          </div>

        </div>
@endsection