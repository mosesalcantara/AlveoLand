
function Create_Primary_Logo_Modal() {
    $('#add-primary-logo-btn').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "/admin/integrations/primary-logo",
            data: "data",
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    $('#upload-primary-logo-data').removeClass('d-none')
                    $('#create-primary-logo-modal').modal('show')

                } else {
                    $('#create-primary-head-data').removeClass('d-none')
                    $('#create-primary-logo-modal').modal('show')
                }
            }
        });

    });

}


function Form_Loader1a() {
    $('#add-primary-logo-btn').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "/admin/integrations/primary-logo",
            data: "data",
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    $('#create-head-form-spinner').addClass('d-none')
                    $('#create-head-form-spinner').removeClass('d-flex')
                    $('#upload-primary-logo-data').removeClass('d-none')
                    $('#create-primary-head-data').removeClass('d-none')

                } else {
                    $('#create-primary-head-data').removeClass('d-none')
                    $('#create-primary-logo-modal').modal('show')
                }
            }
        });

    });

}

function Create_Secondary_Logo_Modal() {
    $('#add-logo-btn').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "/admin/integrations/primary-logo",
            data: "data",
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    $('#create-logo-modal').modal('show')
                    $('#upload-head-data').removeClass('d-none')

                } else {
                    $('#create-head-data').removeClass('d-none')
                    $('#create-logo-modal').modal('show')
                }
            }
        });

    });

}
function Create_Head() {
    $('#create-primary-head-form').submit(function (e) {
        e.preventDefault();
        $('#create-head-form-spinner').removeClass('d-none')
        $('#create-head-form-spinner').addClass('d-flex')
        $('#upload-primary-logo-data').addClass('d-none')
        $('#create-primary-head-data').addClass('d-none')
        $('.errorMessage').text('')
        var formdata = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "/admin/integrations/create",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response)
                if (response.status == 200) {

                    $('#create-head-form-spinner').addClass('d-none')
                    $('#create-head-form-spinner').removeClass('d-flex')
                    $('#upload-primary-logo-data').removeClass('d-none')
                    $('#create-primary-head-data').addClass('d-none')
                } else if (response.status == 400) {
                    $('#create-head-form-spinner').addClass('d-none')
                    $('#create-head-form-spinner').removeClass('d-flex')
                    $('#upload-primary-logo-data').addClass('d-none')
                    $('#create-primary-head-data').removeClass('d-none')
                    $.each(response.errors, function (errors, error) {
                        $('#' + errors + '_').text(error);
                        $('.errorMessage').addClass('text-danger')
                    });
                    var message = '<p>' + response.errors + '</p>'
                }

            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
}
function UploadPrimaryLogo() {
    $('#upload-primary-logo-form').submit(function (e) {
        e.preventDefault();
        $('#create-head-form-spinner').removeClass('d-none')
        $('#create-head-form-spinner').addClass('d-flex')
        $('#upload-primary-logo-data').addClass('d-none')
        $('#create-primary-head-data').addClass('d-none')
        $('.errorMessage').text('')
        var formdata = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "/admin/integrations/upload-primary",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    // HeadForm()
                    $('#imageContainer').empty();
                    $('#imageInput').val(''); // Clear the file input
                    $('#create-head-form-spinner').addClass('d-none')
                    $('#create-head-form-spinner').removeClass('d-flex')
                    $('#upload-primary-logo-data').removeClass('d-none')
                    $('#create-primary-head-data').addClass('d-none')
                    PrimaryLogo_Images()
                    Display_Logo()
                } else if (response.status == 400) {
                    $('#create-head-form-spinner').addClass('d-none')
                    $('#create-head-form-spinner').removeClass('d-flex')
                    $('#upload-primary-logo-data').removeClass('d-none')
                    $('#create-primary-head-data').addClass('d-none')
                    $.each(response.errors, function (errors, error) {
                        $('#' + errors + '_').text(error);
                        $('.errorMessage').addClass('text-danger')
                    });
                    var message = '<p>' + response.errors + '</p>'
                } else {
                    $('#create-head-form-spinner').addClass('d-none')
                    $('#create-head-form-spinner').removeClass('d-flex')
                    $('#upload-head-data').removeClass('d-none')
                    $('#create-head-data').addClass('d-none')

                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
}
function UploadSecondaryLogo() {
    // $('#upload-primary-logo-form').submit(function (e) {
    //     e.preventDefault();
    //     $('#create-head-form-spinner').removeClass('d-none')
    //     $('#create-head-form-spinner').addClass('d-flex')
    //     $('#upload-head-data').addClass('d-none')
    //     $('#create-head-data').addClass('d-none')
    //     $('.errorMessage').text('')
    //     var formdata = new FormData($(this)[0]);
    //     $.ajax({
    //         type: "POST",
    //         url: "/admin/integrations/upload-secondary",
    //         data: formdata,
    //         contentType: false,
    //         processData: false,
    //         success: function (response) {
    //             console.log(response)
    //             if (response.status == 200) {
    //                 $('#imageContainer').empty();
    //                 $('#imageInput').val(''); // Clear the file input
    //                 $('#create-head-form-spinner').addClass('d-none')
    //                 $('#create-head-form-spinner').removeClass('d-flex')
    //                 $('#upload-head-data').removeClass('d-none')
    //                 $('#create-head-data').addClass('d-none')
    //                 PrimaryLogo_Images()
    //                 Display_Logo()
    //             } else if (response.status == 400) {
    //                 $('#create-head-form-spinner').addClass('d-none')
    //                 $('#create-head-form-spinner').removeClass('d-flex')
    //                 $('#upload-head-data').removeClass('d-none')
    //                 $('#create-head-data').addClass('d-none')
    //                 $.each(response.errors, function (errors, error) {
    //                     $('#' + errors + '_').text(error);
    //                     $('.errorMessage').addClass('text-danger')
    //                 });
    //                 var message = '<p>' + response.errors + '</p>'
    //             } else {
    //                 $('#create-head-form-spinner').addClass('d-none')
    //                 $('#create-head-form-spinner').removeClass('d-flex')
    //                 $('#upload-head-data').removeClass('d-none')
    //                 $('#create-head-data').addClass('d-none')

    //             }
    //         },
    //         error: function (xhr, status, error) {
    //             console.error(xhr.responseText);
    //         }
    //     });
    // });
}

function Select_Image() {
    $('#selected-image-file').change(function (event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var dataURL = reader.result;
            $('#imageContainer').html('<img src="' + dataURL + '" id="uploadedImage" style="max-width: 100px;"> <button class="btn" id="removeImageButton"><i class="fa-regular fa-circle-xmark"></i></button>');
        };
        reader.readAsDataURL(input.files[0]);
    });

    $(document).on('click', '#removeImageButton', function () {
        $('#imageContainer').empty();
        $('#imageInput').val(''); // Clear the file input
    });
}
function PrimaryLogo_Images() {
    $('#primary-logo-table').empty();
    $.ajax({
        type: "GET",
        url: "/admin/integrations/gallery/primary",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            $.each(response, function (prop, data) {

                if (data.status == 1) {
                    var logos = "<div class='col-lg-4 col-sm-12'><div class='card'><div class='card-body position-relative bg-dark'><div class='container d-flex justify-content-center'><img class='object-fit-fill border rounded' src='/images/" + data.image_name + "' height='200' width=350 ><div class='position-absolute top-0 end-0 m-5'><button type='button' data-id='" + data.image_id + "' class='btn btn-success unpublish-btn mr-2'>Unpublished</button><button type='button' data-id='" + data.image_id + "' class='btn btn-danger delete-logos'>Delete</button></div></div></div></div>";

                } else {
                    var logos = "<div class='col-lg-4 col-sm-12'><div class='card'><div class='card-body position-relative bg-dark '><div class='container d-flex justify-content-center'><img class='object-fit-fill border rounded' src='/images/" + data.image_name + "' height='200' width=350 ><div class='position-absolute top-0 end-0 m-5'><button type='button' data-id='" + data.image_id + "' class='btn btn-primary publish-btn mr-2'>Publish</button><button type='button' data-id='" + data.image_id + "' class='btn btn-danger delete-logos'>Delete</button></div></div></div></div>";
                }
                $('#primary-logo-table').append(logos);
            });
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });


}
function SecondaryLogo_Images() {
    $('#logo-gallery-table').empty()
    $.ajax({
        type: "GET",
        url: "/admin/integrations/gallery/secondary",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            $.each(response, function (prop, data) {

                if (data.status == 1) {
                    var logos = "<div class='col-lg-4 col-sm-12'><div class='card'><div class='card-body position-relative'><div class='container d-flex justify-content-center'><img class='object-fit-fill border rounded' src='/images/" + data.image_name + "' height='200' width=350 ><div class='position-absolute top-0 end-0 m-5'><button type='button' data-id='" + data.image_id + "' class='btn btn-success unpublish-btn mr-2'>Unpublished</button><button type='button' data-id='" + data.image_id + "' class='btn btn-danger delete-logos'>Delete</button></div></div></div></div>";

                } else {
                    var logos = "<div class='col-lg-4 col-sm-12'><div class='card'><div class='card-body position-relative'><div class='container d-flex justify-content-center'><img class='object-fit-fill border rounded' src='/images/" + data.image_name + "' height='200' width=350 ><div class='position-absolute top-0 end-0 m-5'><button type='button' data-id='" + data.image_id + "' class='btn btn-primary publish-btn mr-2'>Publish</button><button type='button' data-id='" + data.image_id + "' class='btn btn-danger delete-logos'>Delete</button></div></div></div></div>";
                }
                $('#secondary-logo-table').append(logos);
            });
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });


}
function Publish_Image() {
    $(document).on('click', '.publish-btn', function () {
        var id = $(this).data('id');
        console.log(id)
        $.ajax({
            type: "GET",
            url: "/admin/integrations/publish-logo/" + id,
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    PrimaryLogo_Images()
                    Display_Logo()

                } else {

                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })
    $(document).on('click', '.unpublish-btn', function () {
        var id = $(this).data('id');
        console.log(id)
        $.ajax({
            type: "GET",
            url: "/admin/integrations/unpublish-logo/" + id,
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    PrimaryLogo_Images()
                    Display_Logo()
                } else {

                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })
    $(document).on('click', '.delete-logos', function () {
        var id = $(this).data('id');
        console.log(id)
        $.ajax({
            type: "GET",
            url: "/admin/integrations/delete-logo/" + id,
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    PrimaryLogo_Images()
                    Display_Logo()
                } else {

                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })

}

function Display_Logo() {
    $('#display-publish-logo').empty()
    $.ajax({
        type: "GET",
        url: "/admin/integrations/logo/display",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            if (response.status == '1') {
                var active = "<img src='/images/" + response.image_name + "'  height='300' width='400' alt=''>"
            } else if (response.status == 0) {
                $('#display-publish-logo').addClass('d-none')
                var active = "<img src='/static/primary_logo.jpg'  height='300' width='400' alt=''>"

            }
            else {
                var active = "<img src='/static/primary_logo.jpg'  height='300' width='400' alt=''>"
            }
            $('#display-publish-logo').append(active)

        }
    });
}


function Tagline() {
    $('#add-tagline-btn').click(function (e) {
        e.preventDefault();
        $('#create-tagline-modal').modal('show');

    });
    $('#create-tagline-form').submit(function (e) {
        e.preventDefault();
        var formdata = new FormData($(this)[0])
        $.ajax({
            type: "POST",
            url: "/admin/integrations/tagline/create",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    $('#create-tagline-form')[0].reset()
                    Tagline_List_Table()
                    Display_Post()
                } else {

                }

            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $(document).on('click', '.delete-tagline-btn', function (e) {
        e.preventDefault()
        var id = $(this).data('id');
        console.log(id)
        $.ajax({
            type: "GET",
            url: "/admin/integrations/tagline/delete/" + id,
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    Tagline_List_Table()
                    Display_Post()
                } else {
                    Tagline_List_Table()
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })
    $(document).on('click', '.publish-tagline-btn', function (e) {
        e.preventDefault()
        var id = $(this).data('id');
        console.log(id)
        $.ajax({
            type: "GET",
            url: "/admin/integrations/tagline/publish/" + id,
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    Tagline_List_Table()
                    Display_Post()
                } else {
                    Tagline_List_Table()
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })
    $(document).on('click', '.unpublish-tagline-btn', function (e) {
        e.preventDefault()
        var id = $(this).data('id');
        console.log(id)
        $.ajax({
            type: "GET",
            url: "/admin/integrations/tagline/unpublish/" + id,
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    Tagline_List_Table()
                    Display_Post()
                } else {
                    Tagline_List_Table()
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })
}

function Tagline_List_Table() {
    $('#tagline-data').empty()
    $.ajax({
        type: "GET",
        url: "/admin/integrations/tagline/list",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            $.each(response, function (prop, data) {
                if (data.status == 1) {
                    var tagline = "<div class='col-4'><div class='card'><div class='card-body lh-1'><p class='fs-4 text-center'><span>" + data.tagline + "</span></p><hr><p class='text-center fw-semibold'>Tagline</p><div class='d-flex justify-content-center'><button type='button' data-id='" + data.id + "' class='btn btn-danger  m-1 delete-tagline-btn'>Delete</button><button type='button' data-id='" + data.id + "' class='btn btn-success m-1 unpublish-tagline-btn mr-2'>Unpublished</button></div></div></div></div>";


                } else {
                    var tagline = "<div class='col-4'><div class='card'><div class='card-body lh-1'><p class='fs-4 text-center'><span>" + data.tagline + "</span></p><hr><p class='text-center fw-semibold'>Tagline</p><div class='d-flex justify-content-center'><button type='button' data-id='" + data.id + "' class='btn btn-danger m-1 delete-tagline-btn'>Delete</button><button type='button' data-id='" + data.id + "' class='btn btn-primary m-1 publish-tagline-btn mr-2'>Publish</button></div></div></div></div>";

                }

                $('#tagline-data').append(tagline)
            });
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
function Display_Post() {
    $.ajax({
        type: "GET",
        url: "/admin/integrations/tagline/display",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            if (response.status == '1') {
                $('#tagline-view').text(response.tagline)
            } else {
                $('#tagline-view').text('Write your tagline here!')

            }
        }
    });
}