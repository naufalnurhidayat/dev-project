@extends('templates/template-blocked')

@section('title', '403 Access Forbidden')

@section('content')
        <div class="container-fluid">

          <div class="text-center">
            <div class="error mx-auto" data-text="403">403</div>
            <p class="lead text-gray-800">Access Forbidden</p>
            <p class="lead text-gray-800">You cannot access that page, because that page not for you!!!</p>
          </div>

        </div>
@endsection