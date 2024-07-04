@extends('layout.user.layout')
@section('title', 'Alveo | Lease')
@section('lease')
    <style>
        .search_row {
            background-color: rgb(23, 147, 255);
        }

        .search_row button, .search_row button:hover {
            background-color: rgb(25, 69, 107);
        }
    </style>

    <div class="px-3 bg-light" style="height: 100vh" id="for-sale-container px-3 ">
        <div class=" pt-3 display-result">
            <div class="container">
                <div class="row search_row p-3 rounded-4">
                    <form id="sale-search-filter" enctype="multipart/form-data" class="d-flex align-content-center ">
                    <div class="col-md-4 me-3">
                        <select class="form-select" name="category">
                            <option value="">Select Catgory</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Residential">Residential</option>
                        </select>
                    </div>
                    <div class="col-md-3 me-3">
                        <select class="form-select" name="type">
                            <option value="">Choose Type</option>
                            <option value="Studio">Studio</option>
                            <option value="1BR">1BR</option>
                            <option value="2BR">2BR</option>
                            <option value="3BR">3BR</option>
                            <option value="PH">PH</option>
                            <option value="Lot">Lot</option>
                            <option value="H&L">H&L</option>
                            <option value="Office">Office</option>
                        </select>
                    </div>
                    <div class="col-md-4 me-2">
                        <select name="city" class="form-select location-select">
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn text-light">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <span class="text-fs-4">Property result found <span class="property-count"></span></span>
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
