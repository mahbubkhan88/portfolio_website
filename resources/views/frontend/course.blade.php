<div class="container section-marginTop text-center">
    <h1 class="section-title">কোর্স সমূহ </h1>
    <h1 class="section-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
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