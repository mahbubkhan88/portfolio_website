@extends('backend.layouts.master')

@section('title', 'Dashboard')

@section('content')


<div class="container">
    <div class="row">
        
        <div class="col-md-3 p-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="count-card-title">{{ $totalSlider }}</h3>
                    <h6 class="count-card-text">Total Slider</h6>
                    <a class="btn btn-sm btn-success" href="{{ url('/slider') }}">Slider List</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="count-card-title">{{ $totalVisitor }}</h3>
                    <h6 class="count-card-text">Total Visitors</h6>
                    <a class="btn btn-sm btn-success" href="{{ url('/visitor') }}">Visitor List</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-3">
            <div class="card">
                <div class="card-body">
                <h3 class="count-card-title">{{ $totalService }}</h3>
                    <h6 class="count-card-text">Total Services</h6>
                    <a class="btn btn-sm btn-success" href="{{ url('/services') }}">Service List</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-3">
            <div class="card">
                <div class="card-body">
                <h3 class="count-card-title">{{ $totalCourse }}</h3>
                    <h6 class="count-card-text">Total Courses</h6>
                    <a class="btn btn-sm btn-success" href="{{ url('/courses') }}">Course List</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-3">
            <div class="card">
                <div class="card-body">
                <h3 class="count-card-title">{{ $totalProject }}</h3>
                    <h6 class="count-card-text">Total Projects</h6>
                    <a class="btn btn-sm btn-success" href="{{ url('/projects') }}">Project List</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-3">
            <div class="card">
                <div class="card-body">
                <h3 class="count-card-title">{{ $totalContact }}</h3>
                    <h6 class="count-card-text">Total Contacts</h6>
                    <a class="btn btn-sm btn-success" href="{{ url('/contacts') }}">Contact List</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-3">
            <div class="card">
                <div class="card-body">
                <h3 class="count-card-title">{{ $totalReview }}</h3>
                    <h6 class="count-card-text">Total Reviews</h6>
                    <a class="btn btn-sm btn-success" href="{{ url('/reviews') }}">Review List</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-3">
            <div class="card">
                <div class="card-body">
                <h3 class="count-card-title">{{ $totalPhoto }}</h3>
                    <h6 class="count-card-text">Total Photo Gallery</h6>
                    <a class="btn btn-sm btn-success" href="{{ url('/photos') }}">Photo Gallery</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-3">
            <div class="card">
                <div class="card-body">
                <h3 class="count-card-title">{{ $totalPrivacy }}</h3>
                    <h6 class="count-card-text">Total Privacy Policy</h6>
                    <a class="btn btn-sm btn-success" href="{{ url('/privacy') }}">Privacy Policy</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-3">
            <div class="card">
                <div class="card-body">
                <h3 class="count-card-title">{{ $totalReturn }}</h3>
                    <h6 class="count-card-text">Total Return Policy</h6>
                    <a class="btn btn-sm btn-success" href="{{ url('/return') }}">Return Policy</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-3">
            <div class="card">
                <div class="card-body">
                <h3 class="count-card-title">{{ $totalTerms }}</h3>
                    <h6 class="count-card-text">Total Terms & Conditions</h6>
                    <a class="btn btn-sm btn-success" href="{{ url('/term') }}">Terms & Conditions</a>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection