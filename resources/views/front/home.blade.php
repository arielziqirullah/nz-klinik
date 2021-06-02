@extends('front.default')

@section('title', 'Beranda')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/style1.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
@endpush

@section('content')
<div class="row mt-3 mb-5">
    <div class="col">
            @if($slider->isEmpty())
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        Data is Empty
                    </div>
                </div>
            @else
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            
            <div class="carousel-inner shadow-sm carousel-front">
                @foreach ($slider as $key)
                @if($loop->index == 0)
                <div class="carousel-item active">
                    <img src="{{ asset('uploads/') . '/' . $key->image }}" class="d-block w-100" alt="{{ $key->name }}">
                </div>
                @else
                <div class="carousel-item">
                    <img src="{{ asset('uploads/') . '/' . $key->image }}" class="d-block w-100" alt="{{ $key->name }}">
                </div>
                @endif
                @endforeach
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endif
        </div>
    </div>
</div>

<div class="container mt-2">

    <div class="row mt-5 layanan">
        <div class="col-6 text-left">
            <h3 class="fw-normal">Layanan</h3>
        </div>
        <div class="col-6 text-end">
            <a href="{{ route('layanan') }}" class="btn btn-warning btn-sm">Lihat Semua</a>
        </div>
    </div>

    @if($layanan->isEmpty())
    <div class="col-12">
        <div class="alert alert-warning" role="alert">
            Data is Empty
        </div>
    </div>
    @else
    <div class="owl-carousel slide-one-item">
        @foreach ($layanan as $key)
        <div class="d-md-flex testimony-29101 align-items-stretch">
            <div class="image" style="background-image: url({{ asset('uploads/') . '/' . $key->image }});"></div>
            <div class="text text-center">
                <h5>{{ $key->name }}</h5>
                <hr>
                @if($key->isDiscount == 'yes')
                    <h6>Harga Spesial</h6>
                    <h5 class="text-warning">{{ format_rupiah($key->discount) }}</h5>
                    <h6 class="text-muted"><del>{{ format_rupiah($key->price) }}</del></h6>
                @else
                    <h5 class="text-warning">{{ format_rupiah($key->price) }}</h5>
                @endif
            </div>
        </div> <!-- .item -->
        @endforeach
    </div>
    @endif
</div>


<div class="row">
    <div class="col">
        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-6 text-left">
                        <h3 class="fw-normal">Produk</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('catalog') }}" class="btn btn-warning btn-sm">Lihat Semua</a>
                    </div>
                    <div class="col-md-12">
                        
                        @if($produk->isEmpty())
                        <div class="col-12">
                            <div class="alert alert-warning" role="alert">
                                Data is Empty
                            </div>
                        </div>
                        @else
                        <div class="featured-carousel owl-carousel">
                            @foreach ($produk as $key)
                            <div class="item">
                                <div class="work">
                                    <div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url({{ asset('uploads/') . '/' . $key->image }});">
                                        {{-- <a href="#" class="icon d-flex align-items-center justify-content-center">
                                            <span class="ion-ios-search"></span>
                                        </a> --}}
                                    </div>
                                    <div class="text pt-3 w-100 text-center">
                                        <h3><a href="#">{{ $key->name }}</a></h3>
                                        <h6 class="text-warning fw-bold">{{ format_rupiah($key->price) }}</h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(".layanan-item").hover(
        function() {
            $(this).addClass('shadow-lg');
        }
        , function() {
            $(this).removeClass('shadow-lg');
        }
    );

</script>

<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/main2.js') }}"></script>
@endpush
