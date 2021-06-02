@extends('back.templates.default')

@section('title', 'Edit Kategori')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">Edit Kategori</h3>
            </div>

            <form action="{{ route('category_update', $category) }}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Category Name" value="{{ old('name') ?? $category->name }}">
                        @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('category_index') }}" class="btn btn-outline-success">Kembali Ke Master Kategori Produk</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
