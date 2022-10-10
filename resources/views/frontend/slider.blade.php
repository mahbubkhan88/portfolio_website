<div class="container">
    <div class="row">
        <!-- Carousel wrapper -->
        <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <!-- Inner -->
            <div class="carousel-inner">
                <!-- Single item -->
                @foreach($sliderData as $key => $data)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <img src="{{ $data->image }}" class="d-block w-100" alt="Sunset Over the City" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $data->title }}</h5>
                        <p>{{ $data->description }}</p>
                    </div>
                </div>
                @endforeach
                <!-- Single item -->
            </div>
            <!-- Inner -->

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Carousel wrapper -->
    </div>
</div>