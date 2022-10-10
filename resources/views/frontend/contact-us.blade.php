@extends('frontend.layouts.master')


@section('title', 'Contact Us')


@section('content')


<div class="container-fluid jumbotron mt-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6  text-center">
            <img class=" page-top-img fadeIn" src="http://localhost/images/code.svg">
            <h1 class="page-top-title mt-3">- Feel free to contact with us -</h1>
        </div>
    </div>
</div>

<div id="contact" class="container-fluid section-marginTop parallax text-center">
    <div class="row ">
        <div class="col-md-6 contact-form ">
            <h5 class="help-line-title"> <i class="fas icon-custom-color fa-headphones-alt"></i> হেলপ লাইন </h5>
            <h5 class="help-line-title m-0"> ০১৭৭৪৬৮৮১৫৯ </h5>
        </div>
        <div class="col-md-4 contact-form">
            <h5 class="service-card-title">Contact </h5>
            <div class="form-group ">
                <input id="contactNameId" type="text" class="form-control w-100" placeholder="Please enter your Name">
            </div>
            <div class="form-group">
                <input id="contactMobileId" type="text" class="form-control  w-100" placeholder="Please enter your Mobile No">
            </div>
            <div class="form-group">
                <input id="contactEmailId" type="text" class="form-control  w-100" placeholder="Please enter your Email">
            </div>
            <div class="form-group">
                <textarea id="contactMessageId" class="form-control" rows="5" placeholder="Please enter your Message"></textarea>
            </div>
            <button id="mailSendBtnId" class="btn btn-block normal-btn w-100">Send Email</button>
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>


<div id="contact" class="container-fluid section-marginTop text-center">
    <div class="row ">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233668.38703692693!2d90.27919586057241!3d23.780573258035947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1663945562473!5m2!1sen!2sbd" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>


@endsection