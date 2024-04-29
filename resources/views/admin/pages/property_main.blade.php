@extends('layout.admin.layout')
@section('property_main_view')
<div class="card">
    <div class="card-body">
        <div class="container">
            @include('admin/pages/property_header')

<div id="property-gallery-table" class="card">
            <div class="card-body">
          
              <div class="row">
                        <div class="col d-flex flex-row fs-4"><span class="mr-2"><i class="fa-solid fa-list"></i></span><p>Gallery </p></div>
                                        <div class="col d-flex justify-content-end">
            <button id="property-gallery-delete" class="btn btn-danger d-none m-1" type="button">Delete Gallery</button>
            <button id="property-gallery-upload-image-btn" class="btn btn-secondary m-1" type="button">Upload Image</button>
        </div>
              </div>
                 <div class="row ">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div id="checker-message" class="d-flex justify-content-center align-items-center">
                                     <p id="" class="text-center d-none"></p>
                                </div>
               
                                                <div id="image-property-display" class="row d-none">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" >
      <img id="active-property-image" class="d-block w-100"width="200" alt="...">
    </div>


  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        </div>
                            </div>
                        </div>
         
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
      
                    </div>
                 </div>
                 
            </div>

    </div>
    <div id="property-features-amenities-table" class="card">
    <div class="card-body">
                 <div class="row">
                   <div class="col d-flex flex-row fs-4 "><span class="mr-2"><i class="fa-solid fa-list"></i></span><p class="">Features & Amenities </p></div>
                  <div class="col d-flex justify-content-end flex-row fs-4">
            <button id="add-property-features-amenities-btn" class="btn btn-secondary m-1" type="button">Add Features & Amenities</button>
                  </div>
                 </div>
                 <div class="row">
                  <div class="col">
                      <p>Features</p>
                        <div class="accordion accordion-flush" id="features-display">
                          
                        </div>
                      </div>
                                  <div class="col">
                                    <p>Amenities</p>
                                    <div class="accordion accordion-flush" id="amenities-display">
                  </div>
                 </div>
    </div>
</div>
</div>
<div class="card rounded-0">
    <div class="card-body position-relative">
                   <div class="col d-flex flex-row fs-4"><span class="mr-2"><i class="fa-solid fa-list"></i></span><p>Property Plans</p></div>

    <button class="btn btn-primary position-absolute top-0 end-0 m-4" type="button" id="add-floor-plan-btn">Create Plans</button>
    </div>
    <div class="conatiner clearfix p-3">
        <div id="plans_gallery" class="row">
    </div>
  </div>
</div>
          <div id="constraction-updates-table" class="card">
    <div class="card-body">
                    <div class="col d-flex flex-row fs-4"><span class="mr-2"><i class="fa-solid fa-list"></i></span><p>Constraction Updates </p></div>
    <button class="btn btn-primary position-absolute top-0 end-0 m-4" type="button" id="add-construction-updates-btn">Upload Updates</button>
    <div class="row" id="construction-updates"></div>
    </div>
</div>


          <div id="units-table" class="card">
    <div class="card-body overlflow-auto">
                    <div class="col d-flex flex-row fs-4"><span class="mr-2"><i class="fa-solid fa-list"></i></span><p>Lis of Units </p></div>
    <button class="btn btn-primary position-absolute top-0 end-0 m-4" type="button" id="add-unit-btn">Add Unit</button>
    <div id="table-units-container" class="overflow-auto">
      
    </div>
</div>

            

        </div>
    </div>
</div>

@include('layout.admin.modals.property')


<script src="{{asset('js/admin/property.js')}}"></script>
<script>
    $(document).ready(function () {
        Property_Actions()
        Upload_Image_In_Gallery()
        Property_Gallery_Table()
        DeleteGallery()
        Features_Amenities()
        Features_Amenities_Data()
        Add_features_item()
        SubmitFeaturesAmenities()
        FeaturesDataList()
        AmenitiesDataList()


        FloorPlanbtn()
        Create_Plans()
        Display_Plans()
        Show_Plans()
        Create_Floor_Data()


        ConstructionBtn()
        Construction_Updates()




        UnitBtn()
        Unit()
        ImageViewer()
        Unit_Table()
    });
</script>

@endsection