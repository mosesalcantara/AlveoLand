@extends('layout.admin.layout')
@section('title', 'Admin | Awards')
@section('property')
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div id="main-property-section" class="container">
                        <div class="card">
                            <div class="card-body">
                                <p class="fs-4"> <span class="me-3 "><i class="fa-solid fa-list"></i></span>List of Project
                                    Achievements</p>

                                <div class="table-awards-container">

                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary mb-2" id="add-awards-btn">Add Awards</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.admin.modals.awards')

    <script src="{{ asset('js/admin/awards.js') }}"></script>
    <script>
        $(document).ready(function() {
            AwardsBtn()
            AwardsTable()
            CreateAwards()
        });
    </script>
@endsection
