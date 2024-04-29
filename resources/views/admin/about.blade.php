@extends('layout.admin.layout')
@section('title', 'Admin | About')

@section('about_company')
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div id="main-property-section" class="container position-relative">
                        <p class="fs-3">Company Objective</p>
                        <button type="button" class="btn btn-primary mb-2 position-absolute top-0 end-0"
                            id="add-objective-btn">Write Objective</button>

                        <div class="row">
                            <div id="company_ObjectiveData" class="row">

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="card">
                <div class="card-body">
                    <div id="main-property-section" class="container">
                        <p class="fs-3">Missions</p>
                        <div class="row">
                            <div id="missionData" class="row">

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <div id="main-property-section" class="container">
                        <p class="fs-3">Vision</p>
                        <div class="row">
                            <div id="visionData" class="row">

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <div id="main-property-section" class="container">
                        <p class="fs-3">What we do?</p>
                        <div class="row">
                            <div id="company_doData" class="row">

                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary mb-2" id="add-about-btn">Create Data About Company</button>
            </div>
        </div>
    </div>
    @include('layout.admin.modals.about')
    <script src="{{ asset('js/admin/about.js') }}"></script>
    <script>
        $(document).ready(function() {
            CreateAboutObjective()
            AboutBtn()
            CreateAbout()
            AboutContainer()
            Company_Objevtives()

        });
    </script>
@endsection
