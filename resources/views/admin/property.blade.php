@extends('layout.admin.layout')
@section('title', 'Admin | Properties')
@section('property')
    <div class="card">
        <div class="card-body">
            <div id="main-property-section" class="container">
                <div class="card">
                    <div class="card-body">
                        <p class="fs-4"> <span class="me-3 "><i class="fa-solid fa-list"></i></span>List of Properties</p>
                        <div class="table-property-container">

                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary mb-2" id="add-properties-btn">Add Properties</button>
                </div>
            </div>
            <div id="properties-data-section" class="container d-none">
                <div class=""></div>
                <div class=".card">
                    <div class="card-body">
                        <p>Gallery</p>
                        <button type="button" id="upload-property-images-btn" class="btn btn-secondary"><span><span
                                    class="mr-2">Upload</span> <span><i
                                        class="fa-solid fa-upload"></i></span></span></button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('layout.admin.modals.property')

    <script src="{{ asset('js/admin/property.js') }}"></script>
    <script>
        $(document).ready(function() {
            Add_Property()
            Property_Table()
            Property_Actions()
            Property_Btn()
        });
    </script>
@endsection
