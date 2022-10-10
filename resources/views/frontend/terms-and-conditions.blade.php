@extends('frontend.layouts.master')


@section('title', 'Terms and Conditions')


@section('content')


<div class="container-fluid jumbotron mt-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6  text-center">
            <img class=" page-top-img fadeIn" src="http://localhost/images/code.svg">
            <h1 class="page-top-title mt-3">Terms and Conditions</h1>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            @foreach($termData as $data)
            <h2>{{ $data->title }}</h2>
            <p>{{ $data->description }}</p>
            @endforeach
        </div>
    </div>
</div>


@endsection