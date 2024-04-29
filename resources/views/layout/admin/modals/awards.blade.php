

<div class="modal fade" id="view-awards-modal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content ">
          <div class="modal-header">
           <p class="h4" id="">Add awards</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="card">
        <div class="card-body">
            <form id="create-award-form" enctype="multipart/form-data">
            @csrf
                     <label for="">
            Title of Awards 
          </label>
          <input type="text" name="awards_title" class="form-control">
            <p class="errorMessage" id="awards_title_"></p>
                     <label for="">
            Awarder 
          </label>
          <input type="text" name="awarder" class="form-control">
            <p class="errorMessage" id="awarder_"></p>
                     <label for="">
            Date Awarded 
          </label>
          <input type="date" name="date" class="form-control">
            <p class="errorMessage" id="date_"></p>
            <p class="errorMessage" id="awarder_"></p>
                     <label for="">
            Awarding Image 
          </label>
          <input type="file" accept="image/*" name="awards_image" class="form-control">
            <p class="errorMessage" id="awards_image_"></p>

             <div class="col d-flex justify-content-end">
                <button type="submit" id="second-property-form-btn"" class="btn btn-success">
                  <span id="submit-btn" class="mr-2 ">Save Award</span> 
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