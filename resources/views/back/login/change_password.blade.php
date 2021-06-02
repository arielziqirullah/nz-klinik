@extends('back.templates.default')

@section('title', 'Data Pasien')

@section('content')

<div class="row">
    <div class="col">
        <div class="card card-warning">
            <div class="card-header">
                Ganti Password
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        @if(session()->has('message'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('process_change_password') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Password Lama</label>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" name="current_password" type="password">
                                    <div class="input-group-text">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                @error('current_password')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label>Password Baru</label>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" name="new_password" type="password">
                                    <div class="input-group-text">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                @error('new_password')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Konfirm Password Baru</label>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" name="password_confirmation" type="password">
                                    <div class="input-group-text">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa-eye-slash");
                $('#show_hide_password i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa-eye-slash");
                $('#show_hide_password i').addClass("fa-eye");
            }
        });
    });

</script>
@endpush
