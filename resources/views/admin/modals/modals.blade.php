<div class="modal fade" id="create-project-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content rounded-0">

            <div class="modal-header border-0">
                <h3 class="text-primary"><span class="me-3"><i class="fa-solid fa-building"></i></span> New Project
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-project-form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="project_name" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Project Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="project_tagline" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Project Tagline</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" accept="image/*" name="project_logo" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Project Logo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" accept="image/*" name="project_banner" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Project Banner</label>
                    </div>
                    <div class=" d-flex">
                        <div class="form-floating mb-3 me-3 w-100">
                            <input type="text" name="province" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Province </label>
                        </div>
                        <div class="form-floating mb-3 w-100">
                            <input type="text" name="city" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">City </label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="barangay" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Barangay </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="street" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Street </label>
                    </div>

                    <div class="d-flex justify-content-center ">
                        <button class=" px-5 btn btn-primary me-3" type="submit"
                            id="create-project-submit-btn">Submit</button>
                        <button class=" px-5 btn btn-warning" type="button"
                            id="create-project-clear-btn">Clear</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>





<div class="modal fade" id="update-project-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content rounded-0">

            <div class="modal-header border-0">
                <h3 class="text-primary"><span class="me-3"><i class="fa-solid fa-building"></i></span> Update Project
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-project-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-floating mb-3">
                        <input type="text" name="project_name" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Project Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="project_tagline" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Project Tagline</label>
                    </div>
                    <div class="row mb-3 bg-dark">
                        <div class="col-6 text-center">
                            <p>Current Logo</p>
                            <img src="" id="project-logo" height="60" alt="">
                        </div>
                        <div class="col-6 text-center">
                            <p>Current Banner</p>
                            <img src="" id="project-banner" height="60" alt="">
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" accept="image/*" name="project_logo" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Project Logo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" accept="image/*" name="project_banner" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Project Banner</label>
                    </div>
                    <div class=" d-flex">
                        <div class="form-floating mb-3 me-3 w-100">
                            <input type="text" name="province" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Province </label>
                        </div>
                        <div class="form-floating mb-3 w-100">
                            <input type="text" name="city" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">City </label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="barangay" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Barangay </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="street" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Street </label>
                    </div>

                    <div class="d-flex justify-content-center ">
                        <button class=" px-5 btn btn-primary me-3" type="submit"
                            id="create-project-submit-btn">Save</button>
                        <button class=" px-5 btn btn-warning" type="button"
                            id="create-project-clear-btn">Clear</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>














<div class="modal fade" id="create-project-unit-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content rounded-0">

            <div class="modal-header border-0">
                <h3 class="text-primary"><span class="me-3"><i class="fa-solid fa-building"></i></span> New Unit
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-project-unit-form" enctype="multipart/form-data">
                    @csrf

                    <div class="form-floating mb-3">
                        <select name="project_name" class="form-select " id="floatingSelect"
                            aria-label="Floating label select example">
                        </select>
                        <label for="floatingSelect">Choose Project</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="project_unit_no" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Unit No.</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" accept="image/*" name="project_unit_banner" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Unit Banner.</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" accept="image/*" name="project_unit_price" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Amount</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" accept="image/*" name="project_unit_size" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Unit Size</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="project_unit_type" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Choose</option>
                            <option value="Studio">Studio</option>
                            <option value="1BR">1BR</option>
                            <option value="2BR">2BR</option>
                            <option value="3BR">3BR</option>
                            <option value="PH">PH</option>
                        </select>
                        <label for="floatingSelect">Choose Unit Type</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="project_unit_category_type" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Choose</option>
                            <option value="Sale">Sale</option>
                            <option value="Lease">Lease</option>
                        </select>
                        <label for="floatingSelect">Project Category</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="project_unit_category_description" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Choose</option>
                            <option class="sale-type-unit " value="Pre-selling">Pre-selling</option>
                            <option class="sale-type-unit " value="RFO">RFO</option>
                            <option class="lease-type-unit " value="Residential ">Residential </option>
                            <option class="lease-type-unit " value="Commercial">Commercial</option>
                        </select>
                        <label for="floatingSelect">Project Category</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="project_unit_status" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Choose</option>
                            <option value="Available">Available</option>
                            <option value="Unavailable">Unavailable</option>

                        </select>
                        <label for="floatingSelect">Choose Unit Status</label>
                    </div>



                    <div class="d-flex justify-content-center ">
                        <button class=" px-5 btn btn-primary me-3" type="submit" id="">Add Record</button>
                        <button class=" px-5 btn btn-warning" type="button" id="">Clear</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>





<div class="modal fade" id="update-project-unit-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content rounded-0">

            <div class="modal-header border-0">
                <h3 class="text-primary"><span class="me-3"><i class="fa-solid fa-building"></i></span> New Unit
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-project-unit-form" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" id="">
                    <div class="form-floating mb-3">
                        <select name="project_name" class="form-select " id="floatingSelect"
                            aria-label="Floating label select example">
                        </select>
                        <label for="floatingSelect">Choose Project</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="project_unit_no" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Unit No.</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" accept="image/*" name="project_unit_banner" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Unit Banner.</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="project_unit_price" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Amount</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="project_unit_size" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Unit Size</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="project_unit_type" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Choose</option>
                            <option value="Studio">Studio</option>
                            <option value="1BR">1BR</option>
                            <option value="2BR">2BR</option>
                            <option value="3BR">3BR</option>
                            <option value="PH">PH</option>
                        </select>
                        <label for="floatingSelect">Choose Unit Type</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="project_unit_category_type" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Choose</option>
                            <option value="Sale">Sale</option>
                            <option value="Lease">Lease</option>
                        </select>
                        <label for="floatingSelect">Project Category</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="project_unit_category_description" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Choose</option>
                            <option class="sale-type-unit " value="Pre-selling">Pre-selling</option>
                            <option class="sale-type-unit " value="RFO">RFO</option>
                            <option class="lease-type-unit " value="Residential ">Residential </option>
                            <option class="lease-type-unit " value="Commercial">Commercial</option>
                        </select>
                        <label for="floatingSelect">Unit Type</label>
                    </div>



                    <div class="d-flex justify-content-center ">
                        <button class=" px-5 btn btn-primary me-3" type="submit" id="">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>





<div class="modal fade" id="create-project-snapshots-videos-modal" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content rounded-0">

            <div class="modal-header border-0">
                <h3 class="text-primary"><span class="me-3"><i class="fa-solid fa-building"></i></span> Upload
                    Snapshots & Videos
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-project-snapvid-form" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="project_properties_id">
                    <div class="form-floating mb-3">
                        <input type="file" accept="image/*" multiple name="snapshots[]" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Upload Snapshots </label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="file" accept="video/*" multiple name="videos[]" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Upload Video </label>
                    </div>


                    <div class="d-flex justify-content-center ">
                        <button class=" px-5 btn btn-primary me-3" type="submit"
                            id="create-project-submit-btn">Upload</button>
                        <button class=" px-5 btn btn-warning" type="button"
                            id="create-project-clear-btn">Clear</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
</div>







<div class="modal fade" id="create-project-unit-snapshots-videos-modal" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content rounded-0">

            <div class="modal-header border-0">
                <h3 class="text-primary"><span class="me-3"><i class="fa-solid fa-building"></i></span> Upload
                    Snapshots & Videos
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-project-unit-snapvid-form" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="project_units_id">
                    <div class="form-floating mb-3">
                        <input type="file" accept="image/*" multiple name="snapshots[]" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Upload Snapshots </label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="file" accept="video/*" multiple name="videos[]" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Upload Video </label>
                    </div>


                    <div class="d-flex justify-content-center ">
                        <button class=" px-5 btn btn-primary me-3" type="submit"
                            id="create-project-submit-btn">Upload</button>
                        <button class=" px-5 btn btn-warning" type="button"
                            id="create-project-clear-btn">Clear</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
</div>






<div class="modal fade" id="view-request-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content rounded-0">

            <div class="modal-header border-0">
                <h4><span><i class="fa-solid fa-hand"></i></span> Visitation Request</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="vistation-deatails" class="row">

                </div>
            </div>
        </div>

    </div>
</div>
