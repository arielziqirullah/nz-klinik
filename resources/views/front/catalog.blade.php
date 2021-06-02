@extends('front.default')

@section('title', 'Catalog Produk')

@section('content')

<div class="contaier-fluid">
    <div class="row mt-3">
        <div class="col-lg-3 col-sm-12 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title border-bottom">Katalog</h5>
                    <ul class="list-group">
                        @foreach ($categories as $key)
                        <a href="{{ route('catalog', ['category' => $key->id]) }}" class="list-group-item {{ request()->input('category') == $key->id ? ' active' : '' }}">
                            {{ $key->name }} ({{ $key->products->count() }})
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-9">
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="cari_produk" placeholder="Cari produk . ." aria-describedby="button-addon2">
                        {{-- <a href=""> --}}
                            <button class="btn btn-outline-warning cari_produk" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                        {{-- </a> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                @if($products->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            Data is Empty
                        </div>
                    </div>
                @else
                @foreach ($products as $produk)
                <div class="col-sm-12 col-lg-4 mb-2 text-center">
                    <div class="card h-100">
                        <img src="{{ asset('uploads/') . '/' . $produk->image }}" class="card-img-top" alt="{{ $produk->name }}">
                        <div class="card-body">
                            <h4>{{ $produk->name }}</h4>
                            <span class="fw-bold text-warning">{{ format_rupiah($produk->price) }}</span>
                            <p class="card-text mt-4">{{ $produk->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection

@push('scripts')
    <script>
        
        $(document).ready(function(){
            $(".cari_produk").click(function(){
                var str = $("#cari_produk").val();
                var newUrl =  "{{ URL::to('/catalog?search=') }}" + str;
                
                location.replace(newUrl);
                
            });
        });
        
    </script>
@endpush
