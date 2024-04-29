<div class="modal fade" id="create-property-modal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <form id="create-property-form" enctype="multipart/form-data">
              @csrf
               <div id="first-property-form" class="container-fluid ">
                <p class="text-center">Property Informations</p>
          <label for="">
            Property Name
          </label>
            <input type="text" class="form-control" name="property_name">
            <p class="errorMessage" id="property_name_"></p>
          <label for="">
            Property Type 
          </label>

            <select name="property_type" class="form-control">
              <option value="">Select</option>
              <option value="Condominium">Condominium</option>
              <option value="Lots">Lots</option>
              <option value="Office">Office</option>
            </select>
            <p class="errorMessage" id="property_type_"></p>
          <label for="">
            Property Logo 
          </label>
          <input type="file" name="property_logo" class="form-control">
            <p class="errorMessage" id="property_logo_"></p>

          <label for="">
            Ownership Type 
          </label>

            <select name="advertisement_type" class="form-control">
              <option value="">Select</option>
              <option value="0">Property Advertisement</option>
              <option value="1">Client Advertisement</option>

            </select>
            <p class="errorMessage" id="advertisement_type_"></p>
          <label for="">
            Property Availability
          </label>

            <select name="property_availability" class="form-control">
              <option value="">Select</option>
              <option value="Featured">Featured</option>
              <option value="Sold-Out">Sold Out</option>

            </select>
            <p class="errorMessage" id="property_availability_"></p>

          <label for="">
            Tagline
          </label>

            <input type="text" class="form-control" name="tagline">
            <p class="errorMessage" id="tagline_"></p>

          <label for="">
            Description
          </label>
           <textarea name="description" class="form-control w-100" cols="30" rows="3"></textarea>
            <p class="errorMessage" id="description_"></p>

                   <label for="">
            Estimated Price
          </label>

            <input type="text" class="form-control" name="estimated_price">
            <p class="errorMessage" id="estimated_price_"></p>
                   <label for="">
            Price Range
          </label>

            <select name="range"  class="form-control">
              <option value="">Select Price Range</option>
              <option value="5M-10M">5M-10M</option>
              <option value="11M-15M">11M-15M</option>
              <option value="16M-20M">16M-20M</option>
              <option value="21-Above">21-Above</option>
            </select>
            <p class="errorMessage" id="range_"></p>
            <label for="">
            Reference Date
          </label>

            <input type="date" class="form-control" name="reference_date">
            <p class="errorMessage" id="reference_date_"></p>
            <button type="button" id="first-property-form-btn"" class="btn btn-warning mr-2">Next</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>

        </div>
        <div id="second-property-form" class="container-fluid d-none">
          <p class="text-center">Property Address</p>
                      <label class="form-label">
                    Region
                  </label>
                  <select name="_region" class="form-control" id="region">
                  </select>
                  <input type="hidden" class="form-control" name="region"
                  id="region-text" required>
                    <p class="errorMessage" id="region_"></p>
                        <label class="form-label">
                    Province
                  </label>
                  <select name="_province" class="form-control" id="province">
                  </select>
                  <input type="hidden" class="form-control" name="province"
                  id="province-text" required>
                    <p class="errorMessage" id="province_"></p>
                             <label class="form-label">
                    City / Municipality
                  </label>
                  <select name="_city" class="form-control" id="city">
                  </select>
                  <input type="hidden" class="form-control" name="city"
                  id="city-text" required>
                    <p class="errorMessage" id="city_"></p>
                               <label class="form-label">
                    Barangay
                  </label>
                  <select name="_barangay" class="form-control" id="barangay">
                  </select>
                  <input type="hidden" class="form-control" name="barangay"
                  id="barangay-text" required>
                    <p class="errorMessage" id="barangay_"></p>
                           <label for="street-text" class="form-label">
                    Street (Optional)
                  </label>
                  <input type="text" class="form-control" name="street"
                  id="street-text">
                    <p class="errorMessage" id="street_"></p>
        <div class="row">
          <div class="col d-flex justify-content-start">
                <button type="button" id="second-property-form-btn"" class="btn btn-warning">Prev</button> 
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
          </div>
          <div class="col d-flex justify-content-end">
                <button type="submit" id="second-property-form-btn"" class="btn btn-success">
                  <span id="submit-btn" class="mr-2 ">Add Property</span> 
                  <span id="submit-on-process" class="d-none">Processing...</span>
                </button>
          </div>
        </div>

        </div>
        </form>
          </div>
        </div>
   
      </div>

    </div>
  </div>
</div>







<div class="modal fade" id="upload-property-images-modal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <form id="property-gallery-image-form" enctype="multipart/form-data">
              @csrf
              <label for="">Upload here</label>
              <input type="file" name="image_name[]" accept="image/*,video/*" class="form-control" multiple>
              <input type="hidden" name="gallery_id" id="gallery_id" class="form-control" >
              <div class="d-flex justify-content-center">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
              <button type="submit" class="btn btn-primary m-2">Upload now</button>

              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>




<div class="modal fade" id="create-feature-amenities-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><span><i class="fa-solid fa-plus"></i></span> Add Features and Amenities</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <div class="card">
      <div class="card-body">
          <div class="container">
        <form id="create-features-amenities-from" enctype="multipart/form-data">
          @csrf
          <label for="">Name</label>
        <input type="text" name="name" class="form-control">
        <input type="hidden"  name="property_id" class="form-control  property_id">
        <p class="errorMessage" id="name_" ></p>

        <label for="">Type</label>
        <select name="type" class="form-control" id="">
           <option value="">Select</option>
           <option value="0">Features</option>
           <option value="1">Amenities</option>
        </select>
        <p class="errorMessage" id="type_" ></p>
            <div class="col d-flex justify-content-end">
                <button type="submit" id="second-property-form-btn"" class="btn btn-success">
                  <span id="submit-features-amenities-btn" class="mr-2 ">Add Property</span> 
                  <span id="submit-features-amenities-on-process" class="d-none">Processing...</span>
                </button>
          </div>
        </form>
       </div>
      </div>
     </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="add-features_amenities" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><span><i class="fa-solid fa-plus"></i></span> Add Features and Amenities</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <div class="card">
      <div class="card-body">
          <div class="container">
        <form id="create-features-amenities-from" enctype="multipart/form-data">
          @csrf
          <label for="">Name</label>
        <input type="text" name="name" class="form-control">
        <input type="hidden" name="property_id" class="form-control property_id">
        <p class="errorMessage" id="name_" ></p>

        <label for="">Type</label>
        <select name="type" class="form-control" id="">
           <option value="">Select</option>
           <option value="0">Features</option>
           <option value="1">Amenities</option>
        </select>
        <p class="errorMessage" id="type_" ></p>
            <div class="col d-flex justify-content-end">
                <button type="submit" id="second-property-form-btn"" class="btn btn-success">
                  <span id="submit-features-amenities-btn" class="mr-2 ">Add Item</span> 
                  <span id="submit-features-amenities-on-process" class="d-none">Processing...</span>
                </button>
          </div>
        </form>
       </div>
      </div>
     </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="create-floor-plan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><span><i class="fa-solid fa-plus"></i></span> Create Plans</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <div class="card">
      <div class="card-body">
          <div class="container">
        <form id="create-plans-form" enctype="multipart/form-data">
          @csrf
          <label for="">Floor Name</label>
        <input type="text" name="plans_name" class="form-control">
        <input type="hidden"  name="property_id" class="form-control property_id">
        <p class="errorMessage" id="plans_name_" ></p>
          <label for="">Floor Image</label>
        <input type="file" name="floor_image" class="form-control">
        <p class="errorMessage" id="floor_image_" ></p>
            <div class="col d-flex justify-content-end">
                <button type="submit" id="second-property-form-btn"" class="btn btn-success">
                  <span id="submit-features-amenities-btn" class="mr-2 ">Create Plan</span> 
                  <span id="submit-features-amenities-on-process" class="d-none">Processing...</span>
                </button>
          </div>
        </form>
       </div>
      </div>
     </div>
  
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="show-floor-plan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><span><span id="plans_name_data"></span></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mx-auto justify-content-center d-flex mb-2 position-relative">
          <img src="" id="floor_plan_image" height="500" style="max-width: 100%" alt="">
          <button type="button" id="create_plans_details_btn" class="position-absolute top-0 end-0 m-2 btn btn-primary">Add Details</button>
      </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-6">Approximate Size only</div>
                <div class="col-3"><p class="fw-bold">SQ.M</p></div>
                <div class="col-3"><p class="fw-semibold">SQ.FT.</p></div>
              </div>
              <hr>
              <div class="row lh-1 pt-1" id="floor_plan_description"></div>
          </div>
            
        </div>

           <div id="create_floor_details_form" class="card d-none">
      <div class="card-body">
          <div class="container">
        <form id="create-floor-data" enctype="multipart/form-data">
          @csrf
          <div class="d-flex">
                <div class="">
            <label for="">Floor Description</label>
        <input type="text" name="description" class="form-control">
        <input type="hidden" id="plans_id" name="plans_id" class="form-control plans_id">
        <p class="errorMessage" id="plans_id_" ></p>
    </div>
    <div class=" mx-2">
          <label for="">sqm</label>
        <input type="text" name="sqm" class="form-control">
        <p class="errorMessage" id="sqm_" ></p>
    </div>
    <div class="">
              <label for="">sq.ft</label>
        <input type="text" name="sqft" class="form-control">
        <p class="errorMessage" id="sqft" ></p>
    </div>
          </div>

            <div class="d-flex justify-content-end">
              <button class="btn btn-secondary me-2" type="button" id="close_create_plans_details">Close</button>
                <button type="submit" id="second-property-form-btn"" class="btn btn-success">
                  <span id="submit-features-amenities-btn" class="mr-2 ">Create Plan</span> 
                  <span id="submit-features-amenities-on-process" class="d-none">Processing...</span>
                </button>
          </div>
        </form>
       </div>
      </div>
     </div>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="create-construction-updates-modal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content ">
          <div class="modal-header">
           <p class="h4" id="">Upload Construction Updates</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
        <div class="card-body">
            <form id="create-construction-updates-form" enctype="multipart/form-data">
            @csrf
                     <label for="">
            Upload Images of construction updates
          </label>

          <input type="file" name="construction_updates" id="" class="form-control">
        <input type="hidden"  name="property_id" class="form-control  property_id">
          
            <p class="errorMessage" id="construction_updates_"></p>

             <div class="col d-flex justify-content-end">
                <button type="submit" id="second-property-form-btn"" class="btn btn-success">
                  <span id="submit-btn" class="mr-2 ">Save</span> 
                  <span id="submit-on-process" class="d-none">Processing...</span>
                </button>
          </div>
            </form>
          
        </div>  
        </div>   
      </div>

    </div>
  </div>
</div>




<div class="modal fade" id="create-construction-updates-data-modal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content ">
          <div class="modal-header">
           <p class="h4" id="">Upload Construction Updates</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div id="construction-updates-data-image" class="position-relative">
 
       </div>
      </div>

    </div>
  </div>
</div>
















<div class="modal fade" id="create-unit-data-modal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content ">
      <form  id="create-unit-form" enctype="multipart/form-data">
        @csrf
          <div class="modal-header">
           <p class="h4" id="">Create Unit</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <input type="hidden" name="property_id">
      <div class="modal-body">
        <label for="">Name of Unit</label>
        <input name="unit_name" type="text" class="form-control">
             <label for="">Unit Category</label>
                <select id="unit_category_type" name="unit_category_type" class="form-control">
          <option value="">Select Category</option>
          <option value="Lease">Lease</option>
          <option value="Sale">Sale</option>
 
        </select>
                <label for="">Category Description</label>
                <select  name="unit_category_description" class="form-control">
          <option value="">Category Description</option>
          <option class="sale d-none" value="RFO">RFO</option>
          <option class=" sale d-none" value="Pre-selling">Pre-selling</option>
          <option class="lease d-none" value="Commercial">Commercial</option>
          <option class="lease d-none" value="Residential">Residential</option>
  
 
        </select>
        <label class="unit_type d-none" for="">Type of Unit</label>
        <select name="unit_type" class="form-control unit_type d-none" >
          <option value="">Select Type</option>
          <option value="Studio">Studio</option>
          <option value="Penthouse">PH</option>
          <option value="Lots Only">Lots Only</option>
          <option value="House and Lot">House and Lot</option>
          <option value="1 Bedroom">1 Bedroom</option>
          <option value="2 Bedroom">2 Bedroom</option>
          <option value="3 Bedroom">3 Bedroom</option>

        </select>
        <label for="">Rental Rate Range</label>
        <select name="rental_range" id="lease_rental_range" class="form-control" >
               <option value="">Select Range </option>
                <option class="lease_range d-none" value="0-16000">PHP 0.00-16,000.00</option>
                <option class="lease_range d-none" value="16000-32000">PHP 16,000.00-32,000.00</option>
                <option class="lease_range d-none" value="32000-48000">PHP 32,000.00-48,000.00</option>
                <option class="lease_range d-none" value="48000-64000">PHP 48,000.00-64,000.00</option>
                <option class="lease_range d-none" value="64000-80000">PHP 64,000.00-80,000.00</option>

                <option class="sale_range d-none text-secondary p-3" value="1000000-5000000">PHP 1,000,000.00-5,000,000.00</option>
                <option class="sale_range d-none text-secondary p-3" value="6000000-10000000">PHP 6,000,000.00-10,000,000.00</option>
                <option class="sale_range d-none text-secondary p-3" value="11000000-15000000">PHP 11,000,000.00-15,000,000.00</option>
                <option class="sale_range d-none text-secondary p-3" value="16000000-2000000">PHP 16,000,000.00-20,000.00</option>
                <option class="sale_range d-none text-secondary p-3" value="21000000-Above">PHP 21,000,000.00-Above</option>

        </select>
                <label for="">Unit Price</label>
        <input type="text"  class="form-control" name="unit_price">
        <label for="">Unit Description</label>
        <textarea name="unit_description" id="" cols="30" class="form-control" rows="3"></textarea>

        <label for="">Unit Cover Image</label>
        <div id="unit_cover"></div>
        <input type="file"  class="form-control" name="unit_cover">
        <label for="">Unit Images</label>
        <div id="image-preview"></div>
        <input type="file" id="unit_images" multiple class="form-control" name="unit_images[]">
        <label for="">Unit Status</label>
                <select name="unit_status" class="form-control" id="">
          <option value="">Select Type</option>
          <option value="Available">Available</option>
          <option value="Unavailable">Unavailable</option>
 
        </select>
    <label for="">Unit size</label>
        <input type="text" name="unit_size" class="form-control">

       
        <div class="d-flex justify-content-end mt-2">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>

    </div>
  </div>
</div>
