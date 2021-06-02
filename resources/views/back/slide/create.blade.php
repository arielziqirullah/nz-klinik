@extends('back.templates.default')

@section('title', 'Tambahkan Data Slide')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">

            <div class="card-header">
                <h3 class="card-title">Tambah Slide</h3>
            </div>

            <form action="{{ route('slider_store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Slide</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan nama slide" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                </div>

                    <div class="form-group">
                        <label for="">Gambar Slide</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Masukan Gambar" value="{{ old('image') }}">
                        @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('slider_index') }}" class="btn btn-outline-primary">Kembali Ke Master Slider</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection


