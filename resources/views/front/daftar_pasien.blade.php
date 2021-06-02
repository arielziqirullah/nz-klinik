@extends('front.default')

@section('title', 'Daftar Pasien')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endpush

@section('content')

@if(session()->has('message'))
    {{-- <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> --}}
    <div class="alert alert-info alert-dismissible fade show mt-3 text-center" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row mt-5">
    <div class="col-10 mx-auto">
        <div class="card border-warning mb-3">
            <div class="card-header text-center fw-bold">Daftar Pasien</div>
            <div class="card-body">
                <form method="POST" action="{{ route('proses_daftar') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="nama_lenkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control rounded" name="nama" id="nama_lenkap" value="{{ old('nama') }}" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat lahir</label>
                        <input type="text" class="form-control rounded" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir" required>
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Lahir</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                            <input placeholder="masukkan tanggal lahir" type="text" class="form-control datepicker" value="{{ old('tgl_lahir') }}"  name="tgl_lahir" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input check" type="checkbox" name="jenis_kelamin" value="laki-laki" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Laki - laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input check" type="checkbox" name="jenis_kelamin" value="perempuan" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Perempuan
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Tempat Tinggal</label>
                        <input type="text" class="form-control rounded" id="alamat" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control rounded" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                    </div>

                    <div class="mb-3">
                        <label for="no_wa" class="form-label">No. HP (WhatsApp)</label>
                        <input type="number" class="form-control rounded" id="no_wa" name="no_wa" value="{{ old('no_wa') }}" placeholder="No HP" required>
                    </div>

                    <div class="mb-3">
                        <label for="keluhan" class="form-label">Keluhan utama gigi saya :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="keluhan[]" value="Trauma rahang atau gigi patah/copot" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Trauma rahang atau gigi patah/copot
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="keluhan[]" value="Perdarahan berlebihan setelah cabut gigi" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Perdarahan berlebihan setelah cabut gigi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="keluhan[]" value="Perdarahan berlebihan setelah cabut gigi" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Nyeri hebat setelah cabut gigi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="keluhan[]" value="Sakit Gigi" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Sakit Gigi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="keluhan[]" value="Sakit Gigi" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Karang gigi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="keluhan[]" value="Gigi berlubang" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Gigi berlubang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="keluhan[]" value="Gigi Sensitif" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Gigi Sensitif
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="keluhan[]" value="Gigi Sensitif" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Gigi Kuning
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="keluhan[]" value="Gusi Bengkak" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Gusi Bengkak
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="keluhan[]" value="Gusi Bengkak" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Gigi Goyang
                            </label>
                        </div>
                        {{-- <div class="form-check">
                            <input type="checkbox" value="other" id="other" name="keluhan" class="keluhan form-check-input" />
                            <label for="other">:</label>
                        </div> --}}
                        <div class="form-check">
                            <input type="checkbox" id="other"  name="keluhan[]" class="keluhan keluhan-check form-check-input" />
                            <label for="other">Yang lain:</label>
                            <input id='other-text' oninput="updatevalue()" placeholder='Masukan Keluhan . .' type="text" class="form-control keluhan-input" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>

    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()

    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd'
            , autoclose: true
            , todayHighlight: true
        , });
    });

    $(document).ready(function() {
        $('.check').click(function() {
            $('.check').not(this).prop('checked', false);
        });
    });

    $(".keluhan").change(function() {
        //check if the selected option is others
            //toggle textbox visibility
            $("#other-text").toggle();
            
    });
    function updatevalue(){
        return $(".keluhan-check").val($(".keluhan-input").val());
    }


    

</script>
@endpush
