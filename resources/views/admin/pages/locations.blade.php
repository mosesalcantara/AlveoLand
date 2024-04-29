@extends('layout.admin.layout')
@section('locations')
<div class="card">
    <div class="card-body">
        <div class="container">
            @include('admin.pages.header')
            <div class="">
                <div class="logo">

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('admin.landing_page.js')}}"></script>
@endsection