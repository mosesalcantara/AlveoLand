@extends('layout.user.layout')
@section('title', 'Alveo | Locations')
@section('locations')
    <div class="w-100" style="height: 100vh">
        <h1 class="text-center text-primary mt-3 p-4 bg-light"><span class="text-danger"><i
                    class="fa-solid fa-location-dot"></i></span>
            <span id="location-active-data"></span> <span>Area</span>
        </h1>
        <div class=" overflow-y-auto bg-light mt-3">
            <div class="row" id="property-container-location">



            </div>
        </div>
    </div>
    <script src="{{ asset('/js/user/location.js') }}"></script>


@endsection
