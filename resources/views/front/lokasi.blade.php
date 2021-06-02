@extends('front.default')

@section('title', 'Lokasi Klinik')

@section('content')

<div class="row mt-5">
    <div class="col-lg-8 col-sm-12">
        <h3>Maps</h3>
        <div id="map"></div>
    </div>

    <div class="col-lg-4 col-sm-12 my-auto">
        <p class="mt-2">
            <i class="icofont-google-map"></i>
            Jl. I Gusti Ngurah Rai No.43, Tavanjuka, Kecamatan Palu Selatan ( Lantai 2 Apotik Kimia Farma ) Kota Palu, Sulawesi Tengah
        </p>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap&libraries=&v=weekly" async></script>

<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        //const uluru = {
            //lat: -0.9228348577662512
            //,lng: 119.86350274604978
        //};
        // The map, centered at Uluru
        // const map = new google.maps.Map(document.getElementById("map"), {
        //     zoom: 20
        //     , center: uluru
        // , });

        // The marker, positioned at Uluru
        // const marker = new google.maps.Marker({
        //     position: uluru
        //     , map: map
        // , });

        const address = 'Kimia Farma Apotek';

        const mapOptions = {
            zoom: 20,
            center: { lat: -0.9228348577662512, lng: 119.86350274604978 },
        };

        map = new google.maps.Map(document.getElementById("map"), mapOptions);
        const marker = new google.maps.Marker({
            // The below line is equivalent to writing:
            // position: new google.maps.LatLng(-34.397, 150.644)
            position: { lat: -0.9228348577662512, lng: 119.86350274604978 },
            map: map,
        });

        const infowindow = new google.maps.InfoWindow({
            content: "<p>" + address + "</p>",
        });

        google.maps.event.addListener(marker, "click", () => {
            infowindow.open(map, marker);
        });
    }

</script>
@endpush
