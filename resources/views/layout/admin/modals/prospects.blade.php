

<div class="modal fade" id="create-land-prospect-modal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content ">
          <div class="modal-header">
           <p class="h4" id="">Add Land Prospects?</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="card">
        <div class="card-body">
            <form id="create-prospects-form" enctype="multipart/form-data">
            @csrf
            <label for="">Prospect Land</label>
            <select name="city_name" class="form-control" id="city_name">
            </select>
            <p class="errorMessage" id="city_name_"></p>
            <label for="">Prospect Banner</label>
            <input type="file" accept="image/*" name="prospect_banner" id="" class="form-control">
            <p class="errorMessage" id="prospect_banner_"></p>
            <label for="">Creative description</label>
            <textarea name="creative_description" class="form-control" id="" cols="30" rows="3"></textarea>
            <p class="errorMessage" id="creative_description_"></p>
            
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



<div class="modal fade" id="create-featured-prospect-modal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content ">
          <div class="modal-header">
           <p class="h4" id="">Add Item description?</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="card">
        <div class="card-body">
            <form id="create-featured-property-form" enctype="multipart/form-data">
            @csrf
            <label for="">Prospect Property</label>
            <select name="property_name" class="form-control" id="property_name">
            </select>
            <input type="hidden" name="prospect_id" id="prospect_id" class="form-control">
            <p class="errorMessage" id="property_name_"></p>
            <label for="">Creative description</label>
            <textarea name="creative_description" class="form-control" id="" cols="30" rows="3"></textarea>
            <p class="errorMessage" id="creative_description_"></p>
            <label for="">Property Image Banner</label>
            <input type="file" name="featured_banner" accept="image/*" id="" class="form-control">
            <p class="errorMessage" id="featured_banner_"></p>
            
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





<div class="modal fade" id="create-featured-article-modal" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content ">
          <div class="modal-header">
           <p class="h4" id="">Post an article about the city?</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="card">
        <div class="card-body">
            <form  id="create-featured-article-form" enctype="multipart/form-data">
            @csrf
            <label for="">Title</label>
            <input name="title" class="form-control" id="title">
            <input type="hidden" name="prospect_id"  class="prospect_id form-control">
            <p class="errorMessage" id="title_"></p>
            <label for="">Sub title(Optional)</label>
            <input type="text" name="subtitle" id="" class="form-control">
            <label for="">Article</label>
            <textarea name="textbox" class="form-control" id="" cols="30" rows="3"></textarea>
            <p class="errorMessage" id="textbox_"></p>

            
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