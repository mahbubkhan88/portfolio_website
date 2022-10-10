@extends('frontend.layouts.master')


@section('title', 'Returns Policy')


@section('content')


<div class="container-fluid jumbotron mt-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6  text-center">
            <img class=" page-top-img fadeIn" src="http://localhost/images/code.svg">
            <h1 class="page-top-title mt-3">Returns Policy</h1>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            @foreach($returnData as $data)
            <h2>{{ $data->title }}</h2>
            <p>{{ $data->description }}</p>
            @endforeach
        </div>
    </div>
</div>


@endsection