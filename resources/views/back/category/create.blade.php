@extends('back.templates.default')

@section('title', 'Tambah Data Kategori')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">

            <div class="card-header">
                <h3 class="card-title">Tambah Kategori</h3>
            </div>

            <form action="{{ route('category_store') }}" method="post">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan nama kategori" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('category_index') }}" class="btn btn-outline-primary">Kembali Ke Master Kategori Produk</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
