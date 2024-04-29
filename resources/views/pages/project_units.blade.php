@extends('layout.user.layout')
@section('title', 'Alveo | Project |Units')
@section('project_units')
    <div class="bg-light" id="for-sale-unit-container">
        <div class="sale-top-details"></div>
        <div id="display-project-units-properties" class="row py-3 h-100 px-3">

        </div>

    </div>

    <script src="{{ asset('/js/user/units.js') }}"></script>
    <script>
        $(document).ready(function() {
            Display_Project_Units()
            // Display_Project_Details()
            Sale_Units()
            UnitsEvents()
        });
    </script>

@endsection
