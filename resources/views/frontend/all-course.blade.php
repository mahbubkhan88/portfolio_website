@extends('frontend.layouts.master')


@section('title', 'Courses')


@section('content')


<div class="container-fluid jumbotron mt-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6  text-center">
            <img class=" page-top-img fadeIn" src="http://localhost/images/code.svg">
            <h1 class="page-top-title mt-3">- অনলাইন কোর্স সমূহ -</h1>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        
        @foreach($courseData as $data)
        <div class="col-md-4 p-1 text-center">
            <div class="card">
                <div class="text-center">
                    <img class="w-100" src="{{ $data->image }}" alt="Card image cap">
                    <h5 class="service-card-title mt-4"> {{ $data->title }} </h5>
                    <h6 class="service-card-subTitle p-0 "> {{ $data->description }} </h6>
                    <h6 class="service-card-subTitle p-0 "> ফিঃ {{ $data->fee }} টাকা || মোট ক্লাসঃ {{ $data->courseclass }} টি </h6>
                    <h6 class="service-card-subTitle p-0 "> মোট ভর্তিঃ {{ $data->courseclass }} জন </h6>
                    <a href="{{ $data->link }}" target="_blank" class="normal-btn mt-2 mb-4 btn btn-sm"> Read More </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>


@endsection