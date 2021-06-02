@extends('front.default')

@section('title', 'Layanan')

@section('content')

<div class="row mt-3">
    @if($layanan->isEmpty())
    <div class="col-12">
        <div class="alert alert-warning" role="alert">
            Data is Empty
        </div>
    </div>
    @else
    @foreach ($layanan as $key)
    <div class="col-12 col-lg-4 col-md-4 mb-2">
        <div class="card h-100 mb-3 border-warning">
            <div class="row">
                <div class="col-md-4 my-auto mx-auto">
                    <img src="{{ asset('uploads/') . '/' . $key->image }}" alt="{{ $key->name }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title">{{ $key->name }}</h4>
                        <hr>
                        @if($key->isDiscount == 'yes')
                        <h6>Harga Spesial</h6>
                        <h5 class="text-warning">{{ format_rupiah($key->discount) }}</h5>
                        <h6 class="text-muted"><del>{{ format_rupiah($key->price) }}</del></h6>
                        @else
                        <h5 class="text-warning">{{ format_rupiah($key->price) }}</h5>
                        @endif
                        {{-- <p class="card-text">{{ $key->description }}</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif

    <div class="d-flex justify-content-center">
        {{ $layanan->links() }}
        {{-- {{ $layanan->links('pagination::bootstrap-4') }} --}}
    </div>

</div>
@endsection
