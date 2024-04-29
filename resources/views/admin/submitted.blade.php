@extends('layout.admin.layout')
@section('title', 'Admin | Submitted Properties')
@section('submitted')
    <div class="">
        <p class="fw-bold text-primary">INQUIRIES</p>
    </div>
    <div class="row"></div>

    <div class="table-submitted-properties-container bg-light shadow-sm p-3 overflow-x-auto">

    </div>
    @include('admin.modals.inquiry')

    <script src="{{ asset('js/admin/submitted.js') }}"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            Display_Submitted_Properties()
            // Inquiry_Event()
        });
    </script>
@endsection
