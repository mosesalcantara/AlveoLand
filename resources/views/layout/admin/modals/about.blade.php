

<div class="modal fade" id="create-about-modal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content ">
          <div class="modal-header">
           <p class="h4" id="">About Company</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="card">
        <div class="card-body">
            <form id="create-about-form" enctype="multipart/form-data">
            @csrf
                     <label for="">
            About What?
          </label>
          <select class="form-control" name="role" id="">
            <option value="">Select</option>
            <option value="0">Mission</option>
            <option value="1">Vision</option>
            <option value="2">Company Do</option>
          </select>
            <p class="errorMessage" id="role_"></p>
                     <label for="">
            Description
          </label>
            <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
            <p class="errorMessage" id="description_"></p>

             <div class="col d-flex justify-content-end">
                <button type="submit" id="second-property-form-btn"" class="btn btn-success">
                  <span id="submit-btn" class="mr-2 submit-btn">Save</span> 
                  <span id="submit-on-process" class="d-none submit-on-process">Processing...</span>
                </button>
          </div>
            </form>
          
        </div>  
        </div>   
      </div>

    </div>
  </div>
</div>






<div class="modal fade" id="create-objective-modal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content ">
          <div class="modal-header">
           <p class="h4" id="">What is the objective of your company?</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="card">
        <div class="card-body">
            <form id="create-objective-form" enctype="multipart/form-data">
            @csrf
            Description
          </label>
            <textarea name="company_objective" class="form-control" id="" cols="30" rows="10"></textarea>
            <p class="errorMessage" id="company_objective_"></p>

             <div class="col d-flex justify-content-end">
                <button type="submit" id="second-property-form-btn"" class="btn btn-success">
                  <span id="submit-btn" class="mr-2 submit-btn">Save</span> 
                  <span id="submit-on-process" class="d-none submit-on-process">Processing...</span>
                </button>
          </div>
            </form>
          
        </div>  
        </div>   
      </div>

    </div>
  </div>
</div>