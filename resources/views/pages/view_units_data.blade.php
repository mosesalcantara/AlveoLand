@extends('layout.user.layout')
@section('title', 'Alveo | Units')
@section('viwe_units_data')
    <div class="unit-data-view">

    </div>

    @include('layout.user.modal.visitation')
    <script src="{{ asset('/js/user/units.js') }}"></script>
    <script>
        $(document).ready(function() {
            Get_Unit_Data()
            UnitsEvents()
        });
    </script>

@endsection
