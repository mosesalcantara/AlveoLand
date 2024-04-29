@extends('layout.user.layout')
@section('title', 'Alveo | Partnership')
@section('submit_property_form')
    <div class="bg-light h-100">

        <div class="card">
            <div class="card-body">
                <div class="container p-4">
                    <form id="client-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-3">
                                    <div class="card-body">

                                        <h6 class="text-primary"> <strong> NOTE: </strong>To finalize the submission of your
                                            property, please
                                            complete the form by
                                            providing the necessary information.</h6>
                                        <p>Client Contact Informarion/Verification</p>
                                        <div class="d-flex">
                                            <div class="form-floating mb-3 me-3 w-100">
                                                <input type="text" name="first_name" class="form-control"
                                                    id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput">First Name</label>
                                            </div>
                                            <div class="form-floating mb-3 w-100">
                                                <input type="text" name="last_name" class="form-control"
                                                    id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="form-floating mb-3 me-3 w-100">
                                                <input type="text" name="contact" class="form-control" id="floatingInput"
                                                    placeholder="name@example.com">
                                                <label for="floatingInput">Contact</label>
                                            </div>
                                            <div class="form-floating mb-3 w-100">
                                                <input type="text" name="email" class="form-control" id="floatingInput"
                                                    placeholder="name@example.com">
                                                <label for="floatingInput">Email</label>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="form-floating mb-3 me-3 w-100">
                                                <input type="file" accept="image/*" name="front_id" class="form-control"
                                                    id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput my-3">Valid ID (Front)</label>
                                            </div>
                                            <div class="form-floating mb-3 w-100">
                                                <input type="file" accept="image/*" name="back_id" class="form-control"
                                                    id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput my-3">Valid ID (Back)</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Property Information Form</p>
                                        <div class="d-flex">
                                            <div class="form-floating mb-3 me-3 w-100">
                                                <input type="text" accept="image/*" name="project" class="form-control"
                                                    id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput my-3">Project</label>
                                            </div>
                                            <div class="form-floating mb-3 me-3 w-100">
                                                <input type="text" accept="image/*" name="unit_no" class="form-control"
                                                    id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput my-3">Unit No.</label>
                                            </div>
                                            <div class="form-floating w-100">
                                                <select class="form-select" name="purpose" id="floatingSelect"
                                                    aria-label="Floating label select example">
                                                    <option value="">Choose</option>
                                                    <option value="Sale">Sale</option>
                                                    <option value="Lease">Lease</option>
                                                </select>
                                                <label for="floatingSelect">For Sale or Lease?</label>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="form-floating mb-3 me-3 w-100">
                                                <input type="file" accept="image/*" multiple name="images[]"
                                                    class="form-control" id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput my-3">Upload Property Images.</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" id="submit-btn" class="btn btn-primary mt-3 px-5">
                                Submit</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('js/user/client.js') }}"></script>
    <script>
        $(document).ready(function() {
            Submit_Property()
        });
    </script>
@endsection
