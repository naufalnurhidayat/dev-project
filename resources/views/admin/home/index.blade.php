@extends('templates/template-admin')

@section('title', 'Home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron text-center">
                <h1 class="display-4">{{auth()->user()->nama}}</h1>
                <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus quibusdam beatae, vero, reprehenderit sed quis recusandae cumque, odio earum voluptatibus esse! Consectetur nobis magni nihil debitis provident beatae incidunt? Delectus.</p>
                <hr class="my-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam explicabo, itaque autem officia voluptatibus ipsum ipsam ullam fuga dolores aperiam rerum alias, facilis libero. Animi doloribus ut illo quos maxime!</p>
            </div>
        </div>
    </div>
</div>

@endsection