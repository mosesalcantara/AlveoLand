@extends('layout.admin.layout')
@section('title', 'Admin | Submitted Properties')
@section('submitted')
    <div class="">
        <p class="fw-bold text-primary">CLIENTS</p>
    </div>
    <div class="row"></div>

    <div class="table-pending-properties-container bg-light shadow-sm p-3 overflow-x-auto">

    </div>
    @include('admin.modals.modals')

    <script src="{{ asset('js/admin/client.js') }}"></script>
    <script></script>
@endsection
