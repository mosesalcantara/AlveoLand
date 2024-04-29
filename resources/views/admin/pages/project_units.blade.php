@extends('layout.admin.layout')
@section('title', 'Admin | Project | Units')
@section('project_units')

    <div class=" clearfix">
        <h3 class="text-primary float-start " id="project-header-text">UNITS</h3>
        <div class="dropdown float-end ">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-ellipsis-vertical"></i>
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item text-primary" id="create-project-unit-btn" href="#"><span><i
                                class="fa-solid fa-plus"></i></span> Add
                        Units</a></li>
            </ul>
        </div>

    </div>

    <div class="table-project-unit-container bg-light shadow-sm p-3">

    </div>

    <div class="">

    </div>

    @include('admin.modals.modals')
    <script src="{{ asset('js/admin/projects.js') }}"></script>
    <script>
        $(document).ready(function() {
            Unit_Project_Events();
            Display_Project_Units()
            CreateUnit()
            Project_Events()
            Upload_Snap_Vid()
            Update_Unit_Details()

        });
    </script>

@endsection
