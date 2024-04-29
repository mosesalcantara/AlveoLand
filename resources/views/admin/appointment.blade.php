@extends('layout.admin.layout')
@section('title', 'Admin | Appointments')
@section('appointments')

    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="card rounded-0 p-0">
                <div class="card-body ">
                    <p class="text-primary">APPROVED REQUEST</p>
                    <div class="row mb-2">
                        <div class="col border-end border-5 border-primary text-center">
                            <h4 class="text-primary"><i class="fa-solid fa-bell"></i></h4>
                        </div>
                        <div class="col txt-center">
                            <h3 class="text-primary text-center"><span id="approved-request-count"></span></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 bg-light ">
            <div class="card rounded-0 p-0">
                <div class="card-body ">
                    <p class="text-warning">PENDING REQUEST</p>
                    <div class="row mb-2">
                        <div class="col border-end border-5 border-primary text-center">
                            <h4 class="text-primary"><i class="fa-solid fa-bell"></i></h4>
                        </div>
                        <div class="col txt-center">
                            <h3 class="text-primary text-center"><span id="pending-request-count"></span></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 bg-light ">
            <div class="card rounded-0 p-0">
                <div class="card-body ">
                    <p class="text-secondary">COMPLETED VISITATION</p>
                    <div class="row mb-2">
                        <div class="col border-end border-5 border-primary text-center">
                            <h4 class="text-primary"><i class="fa-solid fa-bell"></i></h4>
                        </div>
                        <div class="col txt-center">
                            <h3 class="text-primary text-center"><span id="completed-request-count"></span></i></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <p class="fw-bold text-primary">APPROVED VISITATION REQUEST</p>
            <div class="table-approve-appointments-container bg-light shadow-sm p-3 overflow-x-auto">

            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <p class="fw-bold text-primary">SUBMITTED VISITATION REQUEST</p>
            <div class="table-pending-appointments-container bg-light shadow-sm p-3 overflow-x-auto">

            </div>
        </div>
    </div>
    @include('admin.modals.modals')
    <script src="{{ asset('js/admin/appointments.js') }}"></script>
    <script>
        $(document).ready(function() {
            DisplayOnGoingAppointments()
            DisplayPendngAppointments()
            DashApp()

            Appointment_Event()
        });
    </script>
@endsection
