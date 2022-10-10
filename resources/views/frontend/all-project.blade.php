@extends('frontend.layouts.master')


@section('title', 'Projects')


@section('content')


<div class="container-fluid jumbotron mt-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6  text-center">
            <img class=" page-top-img fadeIn" src="http://localhost/images/code.svg">
            <h1 class="page-top-title mt-3">- প্রজেক্টস সমূহ -</h1>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        
        @foreach($projectData as $data)
        <div class="col-md-3 p-1 text-center">
            <div class=" m-1 card">
                <div class="text-center">
                    <img class="w-100" src="{{ $data->image }}" alt="Card image cap">
                    <h5 class="service-card-title mt-4"> {{ $data->title }} </h5>
                    <h6 class="service-card-subTitle p-0 m-0"> {{ $data->description }} </h6>
                    <a href="{{ $data->link }}" target="_blank" class="normal-btn mt-2 mb-4 btn btn-sm"> Details Info </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>


@endsection