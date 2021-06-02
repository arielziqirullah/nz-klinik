@extends('back.templates.default')

@section('title', 'Edit Produk')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">

            <div class="card-header">
                <h3 class="card-title">Edit Produk</h3>
            </div>

            <form action="{{ route('product_update', $product) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter product name" value="{{ old('name') ?? $product->name }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Product Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description">{{ old('description') ?? $product->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Product Categories</label>
                        <select name="categories[]" id="" class="form-control select2bs4 @error('categories') is-invalid @enderror" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($product->categories->contains($category))
                                    selected="selected"
                                @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('price')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Product Price</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter product price" value="{{ old('price') ?? $product->price }}">
                        @error('price')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Product Qty</label>
                        <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" placeholder="Enter product qty" value="{{ old('qty') ?? $product->qty }}">
                        @error('qty')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Product Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Enter product image" value="{{ old('image') }}">
                        @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('product_index') }}" class="btn btn-outline-primary">Kembali ke Master Produk</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection


@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function(){
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush
