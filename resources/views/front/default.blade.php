<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{{ URL::to('/') . '/' }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="NZ Dental Care Website">
    <meta itemprop="description" content="A great life leads to a beautiful smile and smile is the best make up">
    <meta itemprop="image" content="{{ asset('assets/images/logo/logo.png') }}">

    <link rel="icon" href="{{ asset('assets/images/logo/logo.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    @stack('css')

    <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>NZ Dental Care | @yield('title', 'Beranda')</title>
    <meta name="title" content="NZ Dental Care Website">
    <meta name="description" content="Praktek Dokter Gigi di Kota Palu">
</head>
<body>

    @include('front.templates.navbar')

    <div class="container-md">
        
        @yield('content')

    </div>

    @include('front.templates.footer')

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="{{ asset('assets/js/locales/bootstrap-datepicker.de.js') }}"></script>
    @stack('scripts')

</body>
</html>
