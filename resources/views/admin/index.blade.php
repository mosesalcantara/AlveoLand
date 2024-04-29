@extends('layout.admin.layout')
@section('title', 'Admin | Dashboard')

@section('index')
    <p class="fw-bold text-primary">DASHBOARD</p>

    <div class="row">
        <div class="col-3">
            <div class="card rounded-0 p-0">
                <div class="card-body text-center">
                    <p class="fw-bold text-primary">PROJECTS</p>
                    <div class="row">
                        <div class="col-6 text-center border-end border-primary border-5">
                            <h1 class="text-primary"><i class="fa-solid fa-building"></i></h1>
                        </div>
                        <div class="col-6 text-center">
                            <h1 class="text-primary"><span id="project-count">0</span></h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card rounded-0 p-0">
                <div class="card-body text-center">
                    <p class="fw-bold text-primary">UNITS</p>
                    <div class="row">
                        <div class="col-6 text-center border-end border-primary border-5">
                            <h1 class="text-primary"><i class="fa-solid fa-building-un"></i></h1>
                        </div>
                        <div class="col-6 text-center">
                            <h1 class="text-primary"><span id="unit-count">0</span></h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card rounded-0 p-0">
                <div class="card-body text-center">
                    <p class="fw-bold text-primary">REQUEST</p>
                    <div class="row">
                        <div class="col-6 text-center border-end border-primary border-5">
                            <h1 class="text-primary"><i class="fa-solid fa-bell"></i></h1>
                        </div>
                        <div class="col-6 text-center">
                            <h1 class="text-primary"><span id="request-count">0</span></h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card rounded-0 p-0">
                <div class="card-body text-center">
                    <p class="fw-bold text-primary">INQUIRIES</p>
                    <div class="row">
                        <div class="col-6 text-center border-end border-primary border-5">
                            <h1 class="text-primary"><i class="fa-solid fa-person-circle-question"></i></h1>
                        </div>
                        <div class="col-6 text-center">
                            <h1 class="text-primary"><span id="inquiry-count">0</span></h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/admin/landing_page.js') }}"></script>
    <script>
        $(document).ready(function() {
            Dashboard()
        });
    </script>
@endsection
