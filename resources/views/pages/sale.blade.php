@extends('layout.user.layout')
@section('title', 'Alveo | Sale')
@section('sale')
    <div class="px-3 bg-light" style="height: 100vh" id="for-sale-container px-3 ">
        <div class=" pt-3 display-result">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <span class=" text-dark ">Filter Property</span>
                    <form id="sale-search-filter" enctype="multipart/form-data" class="d-flex align-content-center ">
                        <select name="category">
                            <option value="">Select Catgory</option>
                            <option value="RFO">RFO</option>
                            <option value="Pre-selling">Pre-selling</option>
                        </select>
                        <select name="type">
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
                        <select name="city" class="location-select">
                        </select>
                        <button type="submit" class="btn btn-success rounded-0 ">Filter Now</button>
                        <button type="button" class="btn btn-primary rounded-0 reset-form-btn">Reset</button>

                    </form>
                </div>
            </div>
        </div>
        <br>
        <span class="text-fs-4">Property result found <span class="property-count"></span></span>

        <div id="display-project-sale-units" name='city' class="row">

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
