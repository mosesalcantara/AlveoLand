@extends('layout.user.layout')
@section('title', 'Alveo | Schedul')
@section('schedule_viewing')
    <div id="schedule-view" class="bg-light">

        <div class="row">
            <div class="col-8"></div>
            <div class="col-4 p-5">
                <div class="card">
                    <div class="card-body">
                        <p>Schedule A Visit</p>
                        <form action="">
                            <div class="form-floating mb-3">
                                <input type="text" name="full_name" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Full Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="full_name" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Contact Number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="full_name" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" name="full_name" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Date</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="time" name="full_name" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Time</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/js/user/schedule.js') }}"></script>

@endsection
