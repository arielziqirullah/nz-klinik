@extends('back.templates.default')

@section('title', 'Tambah Data Tindakan')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">

            <div class="card-header">
                <h3 class="card-title">Tambah Tindakan / Layanan</h3>
            </div>

            <form action="{{ route('tindakan_store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Tindakan</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan nama tindakan" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Masukan deskripsi">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="number" name="price" id="price" rows="4" class="form-control @error('price') is-invalid @enderror" placeholder="Masukan harga">{{ old('price') }}
                        @error('price')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Diskon</label>
                        <div class="form-check">
                            <input class="form-check-input check" type="checkbox" name="isDiscount" value="yes" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input check" type="checkbox" name="isDiscount" value="no" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Tidak
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Discount</label>
                        <input type="number" name="discount" id="discount" rows="4" class="form-control @error('discount') is-invalid @enderror" placeholder="Masukan discount" readonly>{{ old('discount') }}
                        @error('discount')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Masukan Gambar" value="{{ old('image') }}">
                        @error('image')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('tindakan_index') }}" class="btn btn-outline-primary">Kembali Ke Master Tindakan</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
    $(document).ready(function() {
        $('.check').click(function() {
            $('.check').not(this).prop('checked', false);
        });
    });

    $(document).ready(function() {
        $('.check').click(function() {
            var rBtnVal = $(this).val();

            if(rBtnVal == "yes"){
                $("#discount").attr("readonly", false); 
            }
            else{ 
                $("#discount").attr("readonly", true); 
            }
        });
    });
    </script>
@endpush
