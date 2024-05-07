@extends('layout.user.layout')
@section('title', 'Alveo | Projects')
@section('user_projects')

    <div class="px-3 bg-light  overflow-y-auto" style="height: 100vh" id="for-sale-container px-3 ">
        <br>
        <h3 class="text-primary">Our Projects</h3>
        <div id="display-project-properties" class="row">

        </div>



    </div>
    <script src="{{ asset('/js/user/projects.js') }}"></script>
    <script>
        $(document).ready(function() {
            Display_Project()
            DisplaySaleUnitEvent()
        });
    </script>

@endsection
