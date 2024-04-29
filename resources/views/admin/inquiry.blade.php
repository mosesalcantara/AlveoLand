@extends('layout.admin.layout')
@section('title', 'Admin | Inquiry')
@section('inquiry')
    <div class="">
        <p class="fw-bold text-primary">INQUIRIES</p>
    </div>
    <div class="row"></div>

    <div class="table-inquiry-container bg-light shadow-sm p-3 overflow-x-auto">

    </div>
    @include('admin.modals.inquiry')

    <script src="{{ asset('js/admin/inquiry.js') }}"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            Display_Pending_Inquiry()
            Inquiry_Event()
        });
    </script>
@endsection
