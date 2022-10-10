@extends('frontend.layouts.master')


@section('title', 'Privacy Policy')


@section('content')


<div class="container-fluid jumbotron mt-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6  text-center">
            <img class=" page-top-img fadeIn" src="http://localhost/images/code.svg">
            <h1 class="page-top-title mt-3">Privacy Policy</h1>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            @foreach($privacyData as $data)
            <h2>{{ $data->title }}</h2>
            <p>{{ $data->description }}</p>
            @endforeach
        </div>
    </div>
</div>


@endsection