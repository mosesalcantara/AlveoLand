@extends('layout.admin.layout')
@section('integrations')
    
    <div class="card rounded-0">
                <div class="card-body">
                    <div class="" id="display-list-head">
                    </div>
                       <div id="display-create-head" >
                        <div class="row">
                            <div class="col-lg-6 col-sm12">
                                <div class="card rounded-0">
                                    <div class="card-body rounded-0  bg-dark">
                                        <p class="fs-2fw-semibold text-light  text-primary "><span class="bg-success p-2">Active Primary Logo</span></p>
                                      <div id="display-publish-logo" class="d-flex justify-content-center">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm12">
                                <div class="card rounded-0">
                                    <div class="card-body text-center rounded-0">
                                        <p class="fs-2fw-semibold text-start text-primary  rounded ">Published Tagline</p>
                                       <p class="fs-4">" <span class="fs-4" id="tagline-view">Post your Unique tagline...</span>"</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                       </div>


                </div>
            </div>


                    <div class="card">
                <div class="card-body">
                     <div class="">
                             <button type="button" id="add-tagline-btn" class="btn btn-primary float-end me-3">Create Tagline<i class="fa-solid fa-plus ms-3"></i></button>
                            </div>
                    <div class="">
                              <div class="conatiner">
                        <p class="fs-4"> <span class="me-3 "><i class="fa-solid fa-list"></i></span>Taglines</p>
                        

                        <div id="tagline-data" class="row">
                    </div>

                    </div>
                    </div>
                </div>
            </div>

<div class="card">
        <div class="card-body ">
             <div class="">
                             <button type="button" id="add-primary-logo-btn" class="btn btn-primary float-end me-3">Create Logo<i class="fa-solid fa-plus ms-3"></i></button>
                            </div>
            <div>
                     <p class="fs-4"> <span class="me-3 "><i class="fa-solid fa-list"></i></span>Primary Logo Gallery</p>
                  <div class="row" id="primary-logo-table">
    
            </div>
            </div>
        </div>
    </div>

            @include('layout.admin.modals.integrations')
            <script src="{{asset('js/admin/integrations.js')}}"></script>
            <script>
                $(document).ready(function () {
                    Create_Primary_Logo_Modal()
                    Create_Secondary_Logo_Modal()
                    Create_Head()
                    // Header_Logo()
                    Select_Image()
                    UploadPrimaryLogo()
                    UploadSecondaryLogo()
                    PrimaryLogo_Images()
                    SecondaryLogo_Images()
                    Publish_Image()
                    Display_Logo()
                    



                    Tagline()
                    Tagline_List_Table()
                    Display_Post()
                });
            </script>

@endsection