@extends('front.default')

@section('title', 'Profil Dokter')

@section('content')

<div class="row profile-dokter mt-5">
    <div class="col-10">
        <div class="card mb-3 shadow-sm">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/profil/image1.jpeg') }}" class="img-thumbnail" alt="drg. Zulfikar Rifqi Mailili">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">drg. Zulfikar Rifqi Mailili</h5>
                        <p class="card-text text-muted">Dokter Gigi</p>
                        <p class="card-text mt-2">Jadwal Praktek</p>
                        <div class="row">
                            <div class="col-6">
                                <i class="icofont-clock-time"></i>
                                Senin - Jumat
                            </div>
                            <div class="col-6">
                                <p>16:00 - 21:00 Wita</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <i class="icofont-clock-time"></i>
                                Sabtu
                            </div>
                            <div class="col-6">
                                <p>10:00 - 14:00 Wita</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row profile-dokter mt-5">
    <div class="col-10">
        <div class="card mb-3 shadow-sm">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/profil/default.png') }}" class="img-thumbnail" alt="drg. Niartanty Nirmala Saleh">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">drg. Niartanty Nirmala Saleh</h5>
                        <p class="card-text text-muted">Dokter Gigi</p>
                        <p class="card-text mt-2">Jadwal Praktek</p>
                        <div class="row">
                            <div class="col-6">
                                <i class="icofont-clock-time"></i>
                                By Appointment
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
