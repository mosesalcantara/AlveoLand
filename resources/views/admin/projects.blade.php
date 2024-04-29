@extends('layout.admin.layout')
@section('title', 'Admin | Projects')
@section('property')
    <div class=" clearfix">
        <h3 class="text-primary float-start " id="project-header-text">PROJECTS</h3>
        oiu
        <div id="project-menu-list" class="dropdown float-end ">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-ellipsis-vertical"></i>
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item text-primary " id="create-project-btn" href="#"><span><i
                                class="fa-solid fa-plus"></i></span> Add
                        Projects</a></li>

            </ul>
        </div>

    </div>

    <div class="table-property-container bg-light shadow-sm p-3 overflow-x-auto">

    </div>

    @include('admin.modals.modals')
    <script src="{{ asset('js/admin/projects.js') }}"></script>
    <script>
        $(document).ready(function() {
            Create()
            Project_Events()
            Property_Table()
            Upload_Snap_Vid()
            Update_Project()

        });
    </script>

@endsection
