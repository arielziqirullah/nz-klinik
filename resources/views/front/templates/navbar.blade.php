<header class="bg-light shadow-sm">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <div class="container">
                        <div class="col-12 col-lg-2 col-md-3">
                            <a class="navbar-brand" href="{{ route('beranda') }}">
                                <img src="{{ asset('assets/images/logo/logo.png') }}" class="logo-nz" alt="">
                                <span class="text-muted">NZ Dental Care<span>
                            </a>
                        </div>
                        <div class="col-12 col-lg-7 col-md-6">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mx-auto me-auto mb-1 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link fw-bolder @if ($current_page == 'beranda') active @endif" aria-current="page" href="{{ route('beranda') }}">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-bolder @if ($current_page == 'layanan') active @endif" href="{{ route('layanan') }}">Layanan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-bolder @if ($current_page == 'catalog') active @endif" href="{{ route('catalog') }}">Produk</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-bolder @if ($current_page == 'profile_dokter') active @endif" href="{{ route('profil') }}">Profil Dokter</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-bolder @if ($current_page == 'lokasi') active @endif" href="{{ route('lokasi') }}">Lokasi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-bolder @if ($current_page == 'daftar_pasien') active @endif" href="{{ route('daftar') }}">Daftar Pasien</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-3 text-right whatsapp-navbar">
                            @php $text = ''; @endphp
                            <a href="https://api.whatsapp.com/send?phone=+628114044224&text=Untuk%20reservasi%20silahkan%20lengkapi%20data%20berikut%0aNama%20:%20%0aUmur%20:%20%0aJenis%20Kelamin%20:%0aAlamat%20:%0aKeluhan%20:" target="_blank" class="btn btn-outline-success"><i class="icofont-brand-whatsapp"></i> 0852-5665-1930</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
