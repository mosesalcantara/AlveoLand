@extends('layout.user.layout')
@section('title', 'Alveo | Sale')
@section('sale')
    <div class="px-3 bg-light" id="for-sale-container px-3 ">
        <div id="display-project-sale-units" class="row">

        </div>
    </div>



    <script src="{{ asset('/js/user/sale.js') }}"></script>
    <script>
        $(document).ready(function() {
            Display_Project_Sale_Units()
            UnitsEvents()

        });
    </script>

@endsection
