@extends('layout.user.layout')
@section('title', 'Alveo | Lease')
@section('lease')
    <div class="px-3 bg-light" id="for-sale-container px-3 ">
        <div id="display-project-lease-units" class="row">

        </div>
    </div>



    <script src="{{ asset('/js/user/lease.js') }}"></script>
    <script>
        $(document).ready(function() {
            Display_Project_Lease_Units()
            UnitsEvents()
        });
    </script>

@endsection
