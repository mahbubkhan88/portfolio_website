@extends('frontend.layouts.master')

@section('title', 'Home')

@section('content')


<div class="container-fluid jumbotron mt-5 ">
    <div class="row">
        <div class="col-md-6 justify-content-center">
            <div class="m-lg-5 m-md-5 p-lg-5 m-sm-3 p-sm-3 p-md-5">
                <h1 class="top-banner-title text-justify">সার্ভিস্ নিন আপনার সময় মত </h1>
                <h1 class="top-banner-subtitle text-justify">প্রফেশনালদের কাছে শিখুন, প্রজেক্ট ভিত্তিক সোর্স কোড সংগ্রহ করুন </h1>
                <h1 class="top-banner-subtitle2 text-justify">মোট সার্ভিস নিয়েছে ২০০ জন </h1>
                 <a target="_blank" href="https://www.youtube.com/channel/UCSMFY8_rooijS-Zv43tKCrQ"><img class="" src="{{ asset('frontend/images/playbtn.svg') }}"></a>
            </div>
        </div>
        <div class="col-md-6">
          <img  class="top-banner-img  animated fadeIn" src="{{ asset('frontend/images/bannerImg.png') }}"> 
        </div>
    </div>
</div>


<div class="container section-marginTop text-center">
    <h1 class="section-title">সার্ভিস সমূহ </h1>
    <h1 class="section-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
    <div class="row">
        <div class="col-md-3 p-2 ">
            <div class="card service-card text-center w-100">
                <div class="card-body">
                    <img class="service-card-logo " src="{{ asset('frontend/images/knowledge.svg') }}" alt="Card image cap">
                    <h5 class="service-card-title mt-3">আইটি কোর্স</h5>
                    <h6 class="service-card-subTitle p-0 m-0">মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট </h6>
                </div>
            </div>
        </div>

        <div class="col-md-3  p-2">
            <div class="card  service-card text-center w-100">
                <div class="card-body">
                    <img class="service-card-logo " src="{{ asset('frontend/images/code.svg') }}" alt="Card image cap">
                    <h5 class="service-card-title mt-3">সোর্স কোড</h5>
                    <h6 class="service-card-subTitle p-0 m-0">মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট </h6>
                </div>
            </div>
        </div>

        <div class="col-md-3  p-2">
            <div class="card  service-card  text-center w-100">
                <div class="card-body">
                    <img class="service-card-logo " src="{{ asset('frontend/images/graphic.svg') }}" alt="Card image cap">
                    <h5 class="service-card-title mt-3">ইন্টারফেস</h5>
                    <h6 class="service-card-subTitle p-0 m-0">মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট </h6>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-2 ">
            <div class="card service-card text-center w-100">
                <div class="card-body">
                    <img class="service-card-logo " src="{{ asset('frontend/images/custom.svg') }}" alt="Card image cap">
                    <h5 class="service-card-title mt-3">কাস্টম সার্ভিস </h5>
                    <h6 class="service-card-subTitle p-0 m-0">মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট </h6>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container section-marginTop text-center">
    <h1 class="section-title">কোর্স সমূহ </h1>
    <h1 class="section-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
    <div class="row">
        <div class="col-md-4 thumbnail-container">
                <img src="{{ asset('frontend/images/android.jpg') }}" alt="Avatar" class="thumbnail-image ">
                <div class="thumbnail-middle">
                    <h1 class="thumbnail-title"> লারাভেল এবং প্রোজেক্ট </h1>
                    <h1 class="thumbnail-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
                    <button class="normal-btn btn">শুরু করুন</button>
                </div>
        </div>
        <div class="col-md-4 thumbnail-container">
                <img src="{{ asset('frontend/images/react.jpg') }}" alt="Avatar" class="thumbnail-image">
                <div class="thumbnail-middle">
                    <h1 class="thumbnail-title"> লারাভেল এবং প্রোজেক্ট </h1>
                    <h1 class="thumbnail-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
                    <button class="normal-btn btn">শুরু করুন</button>
                </div>
        </div>
        <div class="col-md-4 thumbnail-container ">
                <img src="{{ asset('frontend/images/laravel.jpg') }}" alt="Avatar" class="thumbnail-image ">
                <div class="thumbnail-middle">
                    <h1 class="thumbnail-title"> লারাভেল এবং প্রোজেক্ট </h1>
                    <h1 class="thumbnail-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
                    <button class="normal-btn btn">শুরু করুন</button>
                </div>
        </div>
        <div class="col-md-4 thumbnail-container ">
                <img src="{{ asset('frontend/images/react.jpg') }}" alt="Avatar" class="thumbnail-image">
                <div class="thumbnail-middle">
                    <h1 class="thumbnail-title"> লারাভেল এবং প্রোজেক্ট </h1>
                    <h1 class="thumbnail-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
                    <button class="normal-btn btn">শুরু করুন</button>
                </div>
        </div>
        <div class="col-md-4 thumbnail-container">
                <img src="{{ asset('frontend/images/laravel.jpg') }}" alt="Avatar" class="thumbnail-image">
                <div class="thumbnail-middle">
                    <h1 class="thumbnail-title"> লারাভেল এবং প্রোজেক্ট </h1>
                    <h1 class="thumbnail-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
                    <button class="normal-btn btn">শুরু করুন</button>
                </div>
        </div>
        <div class="col-md-4 thumbnail-container">
                <img src="{{ asset('frontend/images/react.jpg') }}" alt="Avatar" class="thumbnail-image">
                <div class="thumbnail-middle">
                    <h1 class="thumbnail-title"> লারাভেল এবং প্রোজেক্ট </h1>
                    <h1 class="thumbnail-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
                    <button class="normal-btn btn">শুরু করুন</button>
                </div>
        </div>
    </div>
</div>



    <div class="container section-marginTop text-center">
        <h1 class="section-title">প্রজেক্ট</h1>
        <h1 class="section-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
        <div class="row">

            <div id="one"  class="owl-carousel mb-4 owl-theme">
                <div class="item m-1 card">
                    <div class="text-center">
                        <img class="w-100" src="{{ asset('frontend/images/poject.jpg') }}" alt="Card image cap">
                        <h5 class="service-card-title mt-4">আইটি কোর্স</h5>
                        <h6 class="service-card-subTitle p-0 m-0">মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট </h6>
                        <button class="normal-btn-outline mt-2 mb-4 btn">বিস্তারিত</button>
                    </div>
                </div>
                <div class="item m-1 card">
                    <div class="text-center">
                        <img class="" src="{{ asset('frontend/images/poject.jpg') }}" alt="Card image cap">
                        <h5 class="service-card-title mt-4">আইটি কোর্স</h5>
                        <h6 class="service-card-subTitle p-0 m-0">মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট </h6>
                        <button class="normal-btn-outline mt-2 mb-4 btn">বিস্তারিত</button>
                    </div>
                </div>
                <div class="item m-1 card">
                    <div class="text-center">
                        <img class="" src="{{ asset('frontend/images/poject.jpg') }}" alt="Card image cap">
                        <h5 class="service-card-title mt-4">আইটি কোর্স</h5>
                        <h6 class="service-card-subTitle p-0 m-0">মোবাইল  এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট </h6>
                        <button class="normal-btn-outline mt-2 mb-4 btn">বিস্তারিত</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="d-inline ml-2">
            <i id="customPrevBtn" class="btn normal-btn"><</i>
            <i id="customNextBtn" class="btn normal-btn">></i>
            <button class="normal-btn  btn">সব গুলো </button>
        </div>
    </div>



<div class="container-fluid section-marginTop parallax text-center">
    <div class="row ">
        <div class="col-md-6 contact-form ">
            <h5 class="help-line-title"> <i class="fas icon-custom-color fa-headphones-alt"></i> হেলপ লাইন </h5>
            <h5 class="help-line-title m-0">  ০১৭৭৪৬৮৮১৫৯ </h5>
        </div>
        <div class="col-md-4 contact-form">
                <h5 class="service-card-title">যোগাযোগ করুন </h5>
                <div class="form-group ">
                    <input type="text" class="form-control w-100" placeholder="আপনার নাম">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control  w-100" placeholder="মোবাইল নং">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control  w-100" placeholder="ইমেইল">
                </div>

                <div class="form-group">
                    <textarea class="form-control" placeholder="মেসেজ" rows="7"></textarea>
                </div>

                <button type="submit" class="btn btn-block normal-btn w-100">পাঠিয়ে দিন </button>
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>




<div class="container section-marginTop text-center">
    <h1 class="section-title">সাম্প্রতিক ব্লগ </h1>
    <h1 class="section-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
    <div class="row">
        <div class="col-md-4  p-2 ">
            <div class="card">
                <img class="w-100" src="{{ asset('frontend/images/blog.jpg') }}" alt="Card image cap">
                <div class="w-100 p-4">
                    <h5 class="blog-card-title text-justify  mt-2">ফ্লাটার কেনো শিখবেন, কেনো শিখবেন না </h5>
                    <h6 class="blog-card-subtitle text-justify p-0 ">মোবাইল স্ক্রিনের বিবর্তন হলো যেভাবে. আইবিএম সায়মন: প্রথম মোবাইল ফোন যারা টাচস্ক্রীন প্রযুক্তি এনেছিল। তবে ফোনটির ব্যাটারি মাত্র এক ঘণ্টা স্থায়ী হতো।</h6>
                    <h6 class="blog-card-date text-justify "> <i class="far fa-clock"></i> ২৪/০৫/২০২০</h6>
                    <button class="normal-btn-outline float-left mt-2 mb-4 btn">আরো পড়ুন </button>
                </div>
            </div>
        </div>

        <div class="col-md-4  p-2 ">
            <div class="card">
                <img class="w-100" src="{{ asset('frontend/images/blog.jpg') }}" alt="Card image cap">
                <div class="w-100 p-4">
                    <h5 class="blog-card-title text-justify  mt-2">ফ্লাটার কেনো শিখবেন, কেনো শিখবেন না </h5>
                    <h6 class="blog-card-subtitle text-justify p-0 ">মোবাইল স্ক্রিনের বিবর্তন হলো যেভাবে. আইবিএম সায়মন: প্রথম মোবাইল ফোন যারা টাচস্ক্রীন প্রযুক্তি এনেছিল। তবে ফোনটির ব্যাটারি মাত্র এক ঘণ্টা স্থায়ী হতো।</h6>
                    <h6 class="blog-card-date text-justify "> <i class="far fa-clock"></i> ২৪/০৫/২০২০</h6>
                    <button class="normal-btn-outline float-left mt-2 mb-4 btn">আরো পড়ুন </button>
                </div>
            </div>
        </div>

        <div class="col-md-4  p-2 ">
            <div class="card">
                <img class="w-100" src="{{ asset('frontend/images/blog.jpg') }}" alt="Card image cap">
                <div class="w-100 p-4">
                    <h5 class="blog-card-title text-justify  mt-2">ফ্লাটার কেনো শিখবেন, কেনো শিখবেন না </h5>
                    <h6 class="blog-card-subtitle text-justify p-0 ">মোবাইল স্ক্রিনের বিবর্তন হলো যেভাবে. আইবিএম সায়মন: প্রথম মোবাইল ফোন যারা টাচস্ক্রীন প্রযুক্তি এনেছিল। তবে ফোনটির ব্যাটারি মাত্র এক ঘণ্টা স্থায়ী হতো।</h6>
                    <h6 class="blog-card-date text-justify "> <i class="far fa-clock"></i> ২৪/০৫/২০২০</h6>
                    <button class="normal-btn-outline float-left mt-2 mb-4 btn">আরো পড়ুন </button>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="container section-marginTop text-center">
    <div class="row d-flex justify-content-center">
            <div class="col-md-6 text-center">
                <div id="two" class="owl-carousel mb-4 owl-theme">
                <div class="item m-1 text-center ">
                        <img class="review-img text-center" src="{{ asset('frontend/images/bill.jpg') }}" alt="Card image cap">
                        <h5 class="service-card-title mt-3">বিল গেটস </h5>
                        <h6 class="service-card-subTitle p-0 m-0">মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে নানা ঘটনার মধ্য দিয়ে। হার্ভার্ড বিশ্ববিদ্যালয়ে লেখাপড়া শেষ না করেই মাইক্রোসফট প্রতিষ্ঠা করা</h6>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection