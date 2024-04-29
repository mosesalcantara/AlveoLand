
<div class="modal fade" id="create-primary-logo-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><span><i class="fa-solid fa-upload mr-2"></i></span> Upload</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="create-primary-head-data" class="d-none">
        <form id="create-primary-head-form" enctype="multipart/form-data">
          @csrf
          <p class="text-center text-secondary" id="head-name-text-preview"></p>
          <label for="">Gallery Name</label>
          <input type="text" class="form-control mb-2" name="name">
          <input type="hidden" name="role" value="1">
          <p class="errorMessage" id="name"></p>
          <div class="d-flex flex-row justify-content-center">
          <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
        </div>
        <div id="create-head-form-spinner" class="d-none justify-content-center align-items-center" id="sinn">
          <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        </div>
      <div id="upload-primary-logo-data" class="d-none">
          <div class="card">
          <div class="card-body">
            <p class="text-center">Image Preview</p>
          <div id="imageContainer"></div>
          </div>
        </div>
        <form id="upload-primary-logo-form" enctype="multipart/form-data" >
          @csrf
          <input type="hidden" name="role" value="1">
          <input type="file" id="selected-image-file" class="form-control mb-2" name="image">
          <p class="errorMessage" id="image"></p>
          <div class="d-flex flex-row justify-content-center">
          <button type="submit" class="btn btn-primary">Upload</button>

          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>


















<div class="modal fade" id="create-tagline-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><span><i class="fa-solid fa-plus"></i></span> Create Tagline</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="create-tagline-form" enctype="multipart/form-data">
          @csrf
          <label for="">Text Box</label>
          <textarea name="tagline" id="" cols="30" rows="5" placeholder="Write here" class="form-control mb-2"></textarea>
          <div class="d-flex justify-content-center">
            
            <button class="btn btn-primary" type="submit">Add</button>
          </div>
        </form>
  
      </div>
    </div>
  </div>
</div>












