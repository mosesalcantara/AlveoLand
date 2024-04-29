@extends('layout.user.layout')
@section('title', 'Alveo | Send Inquiry')
@section('send_inquiry')
    <div class="bg-light"
        style="background:linear-gradient(to left, rgba(255,255,255,0.5),rgba(27, 139, 219, 0.502)), url('{{ asset('/static/test.jpeg') }}') ;height:  100vh">
        <div class="row">


            <div class="row mt-5    ">

                <div class="col-lg-1 col-sm-1"></div>
                <div class="col-lg-10 col-sm-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-7 col-sm-12 p-5">
                                    <p class="fw-semibold fs-4 " style="color: rgb(22, 160, 233)">Send us a Message</p>
                                    <form id="submit-inquiry-form" class="w-100">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 mb-2">

                                                <div class="form-floating">
                                                    <select name="type_of_inquiry" class="form-select" id="floatingSelect"
                                                        aria-label="Floating label select example">
                                                        <option value="">Type of Inquiry</option>
                                                        <option value="Sales Inquiry"> Sales Inquiry</option>
                                                        <option value="Leasing Inquiry"> Leasing Inquiry</option>
                                                    </select>
                                                    <label for="floatingSelect">Works with selects</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-2 ">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-floating">
                                                            <select name="gender_identification" class="form-select"
                                                                id="floatingSelect"
                                                                aria-label="Floating label select example">
                                                                <option value="Mr">Mr</option>
                                                                <option value="Mrs">Mrs</option>
                                                                <option value="Ms">Ms</option>
                                                            </select>
                                                            <label for="floatingSelect"></label>
                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="f_name" class="form-control"
                                                                id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">First Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="l_name" class="form-control"
                                                                id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">First Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="age" class="form-control"
                                                                id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">Age</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="email" name='email' class="form-control"
                                                                id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" name='phone_num' class="form-control"
                                                                id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">Contact Number</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <textarea name="message" id="" class="form-control" cols="30" rows="4"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn px-4  text-light"
                                                        style="background: rgb(22, 118, 221)"> <span
                                                            class="me-3  text-light"><i
                                                                class="fa-regular fa-paper-plane"></i></span>Submit</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4"></div>
                                        </div>

                                    </form>
                                </div>
                                <div class="col-lg-5 col-sm-12 bg-secondary"
                                    style="background:linear-gradient(to left, rgba(255,255,255,0.2),rgba(27, 139, 219, 0.502)), url('{{ asset('/static/test1.jpg') }}'); background-size:cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-sm-0"></div>
            </div>

        </div>






        <script src="{{ asset('/js/user/about.js') }}"></script>
        {{-- <script src="{{ asset('/js/dialcode.json') }}"></script> --}}
        <script>
            $(document).ready(function() {

                $('#submit-inquiry-form').submit(function(e) {
                    e.preventDefault();
                    var formdata = new FormData($(this)[0])
                    $('#submit-inquiry-form span').remove()
                    $.ajax({
                        type: "POST",
                        url: "/inquiry/submit",
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log((response));
                            if (response.status == 200) {
                                showtoastMessage('text-success', 'Success', response.message)
                                $('#submit-inquiry-form')[0].reset()
                            } else if (response.status == 400) {

                                $.each(response.errors, function(errorIndex, errorData) {
                                    $('<span class="text-danger">' + errorData + '</span>')
                                        .insertAfter($('input[name=' + errorIndex + ']'));
                                });

                            }

                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseTxt)
                        }
                    });

                });



            });

            function showtoastMessage(toastColor, toastHeader, toastContent) {
                $("#toast-header").removeClass(toastColor);
                $("#toast-header").addClass(toastColor);
                $("#toast-header").text(toastHeader);
                $("#toast-content").text(toastContent);
                const toastBootstrap = new bootstrap.Toast("#toasMessage");
                toastBootstrap.show();
            }
        </script>
    @endsection
