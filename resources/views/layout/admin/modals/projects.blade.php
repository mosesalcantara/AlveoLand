<div class="modal fade" id="create-projects-modal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <form id="create-project-form" enctype="multipart/form-data">
              @csrf
               <div id="first-property-form" class="container-fluid ">
                <p class="text-center">Project Informations</p>
          <label for="">
            Project Name
          </label>
            <input type="text" class="form-control" name="project_name">
            <p class="errorMessage" id="project_name_"></p>
    
          <label for="">
            Project Logo 
          </label>
          <input type="file" name="project_logo" class="form-control">
            <p class="errorMessage" id="project_logo_"></p>
          <label for="">
           Project Tagline
          </label>

                  <input type="text" name="project_tagline" class="form-control">

            <p class="errorMessage" id="project_tagline_"></p>

          <label for="">
            Availability
          </label>
          <select name="project_availability" id="" class="form-control">
            <option value="">Select</option>
            <option value="0">Featured</option>
            <option value="1">Soldout</option>
          </select>
            <p class="errorMessage" id="project_availability_"></p>

          <label for="">
            Description
          </label>
           <textarea name="project_description" class="form-control w-100" cols="30" rows="3"></textarea>
            <p class="errorMessage" id="project_description_"></p>


            <button type="button" id="first-property-form-btn"" class="btn btn-warning mr-2">Next</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>

        </div>
        <div id="second-property-form" class="container-fluid d-none">
          <p class="text-center">Project Address</p>
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
                <button type="button" id="second-property-form-btn"" class="btn btn-warning me-2">Prev</button> 
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









<div class="modal fade" id="view-project-modal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content ">
          <div class="modal-header">
           <p class="h4" id="project-name"></p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="card">
        <div class="card-body">
          <div class="project-images" style="height: 300; width:400px;"></div>
        <div class="project_details"></div>
          
        </div>  
        </div>   
      </div>

    </div>
  </div>
</div>





