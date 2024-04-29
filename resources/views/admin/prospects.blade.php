@extends('layout.admin.layout')
@section('title', 'Admin | Prospects')

@section('prospects')
    <div class="card" id="main-prospect-section">
        <div class="card-body">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <p class="fs-4"> <span class="me-3 "><i class="fa-solid fa-list"></i></span>List of Prospects</p>
                        <div class="table-prospects-container">

                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary mb-2" id="add-land-prospects-btn">Add Prospects</button>
                </div>
            </div>

        </div>
    </div>




    <div class="card d-none" id="main-prospect-data-section">
        <div class="card-body">
            <div class="position-relative">
                <button type="button" id="close-main-prospect-data-section-btn" class="btn">
                    <span class="me-2"><i class="fa-solid fa-arrow-left"></i></span>
                    back
                </button>

                <div class="dropdown position-absolute top-0 end-0">
                    <button class="btn dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><button type="button" id="create-feature-property-btn" class="dropdown-item">Create For Sale
                                Properties</button></li>
                        <li><button type="button" id="create-feature-property-article-btn" class="dropdown-item">Create
                                Article</button></li>
                    </ul>
                </div>
            </div>
            <div class="row" id="featured_properties">

            </div>


            <div id="main-prospect-article">

            </div>
        </div>
    </div>


    @include('layout.admin.modals.prospects')

    <script src="{{ asset('js/admin/prospects.js') }}"></script>
    <script>
        $(document).ready(function() {
            ProspectsBtn()
            Create_Prospects()
            ProspectsTable()
            Create_Prospect_Data()
            Featured_Properties_Data_Display()
            Close_Btn()
            Create_Land_Article()



            ArticleBtn()

        });
    </script>
@endsection
