function AboutBtn() {

    $('#add-about-btn').click(function (e) {
        e.preventDefault();
        $('#create-about-modal').modal('show')
    });

    $(document).on('click', '#add-objective-btn', function (e) {
        e.preventDefault()
        $('#create-objective-modal').modal('show')
    })




    $(document).on('click', '.delete_mission_btn', function (e) {
        e.preventDefault()
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "/admin/about/delete-data/" + id,
            data: "data",
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    AboutContainer()
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })
    $(document).on('click', '.edit_mission_btn', function (e) {
        e.preventDefault()
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "/admin/about/delete-data/" + id,
            data: "data",
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    AboutContainer()
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })
}

function CreateAboutObjective() {
    $('#create-objective-form').submit(function (e) {
        e.preventDefault();
        $('.submit-on-process').removeClass('d-none')
        $('.submit-btn').addClass('d-none')
        $('.errorMessage').text('')
        var formdata = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "/admin/about/objective/create",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    Company_Objevtives()
                    $('#create-objective-form')[0].reset()
                    $('.submit-on-process').addClass('d-none')
                    $('.submit-btn').removeClass('d-none')
                } else {
                    $.each(response.errors, function (errors, error) {
                        $('#' + errors + '_').text(error);
                        $('.errorMessage').addClass('text-danger')
                        $('.submit-on-process').addClass('d-none')
                        $('.submit-btn').removeClass('d-none')
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

function CreateAbout() {
    $('#create-about-form').submit(function (e) {
        e.preventDefault();
        $('#submit-on-process').removeClass('d-none')
        $('#submit-btn').addClass('d-none')
        $('.errorMessage').text('')
        var formdata = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "/admin/about/create",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    AboutContainer()
                    $('#create-about-form')[0].reset()
                    $('#submit-on-process').addClass('d-none')
                    $('#submit-btn').removeClass('d-none')
                } else {
                    $.each(response.errors, function (errors, error) {
                        $('#' + errors + '_').text(error);
                        $('.errorMessage').addClass('text-danger')
                        $('#submit-on-process').addClass('d-none')
                        $('#submit-btn').removeClass('d-none')
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

function AboutContainer() {
    $('#missionData').empty()
    $('#visionData').empty()
    $('#company_doData').empty()

    $.ajax({
        type: "GET",
        url: "/admin/about/list",
        data: "data",
        dataType: "json",
        success: function (response) {
            $.each(response.mission, function (index, data) {
                var mission = "<div class='col-lg-6 col-sm-12'><div class='card'><div class='card-body'><p>" + data.description + "</p></div><div class='card-footer'><div class='d-flex justify-content-end'><button type='button'data-id='" + data.id + "'  class='btn btn-primary m-1 edit_mission_btn'><i class='fa-solid fa-pen-to-square'></i></button><button type='button'data-id='" + data.id + "'  class='btn btn-danger m-1 delete_mission_btn'><i class='fa-solid fa-trash'></i></button></div></div></div></div>"
                $('#missionData').append(mission)
            });
            $.each(response.vision, function (index, data) {
                var vision = "<div class='col-lg-6 col-sm-12'><div class='card'><div class='card-body'><p>" + data.description + "</p></div><div class='card-footer'><div class='d-flex justify-content-end'><button type='button'data-id='" + data.id + "'  class='btn btn-primary m-1 edit_mission_btn'><i class='fa-solid fa-pen-to-square'></i></button><button type='button'data-id='" + data.id + "'  class='btn btn-danger m-1 delete_mission_btn'><i class='fa-solid fa-trash'></i></button></div></div></div></div>"
                $('#visionData').append(vision)
            });

            $.each(response.company_do, function (index, data) {
                var company_do = "<div class='col-lg-6 col-sm-12'><div class='card'><div class='card-body'><p>" + data.description + "</p></div><div class='card-footer'><div class='d-flex justify-content-end'><button type='button'data-id='" + data.id + "'  class='btn btn-primary m-1 edit_mission_btn'><i class='fa-solid fa-pen-to-square'></i></button><button type='button'data-id='" + data.id + "'  class='btn btn-danger m-1 delete_mission_btn'><i class='fa-solid fa-trash'></i></button></div></div></div></div>"
                $('#company_doData').append(company_do)
            });
            $('#submit-on-process').addClass('d-none')
            $('#submit-btn').removeClass('d-none')

        }
    });
}

function Company_Objevtives() {
    $('#company_ObjectiveData').empty()
    $.ajax({
        type: "GET",
        url: "/admin/property/company-objective/data",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            if (response.status == 200) {
                var company_obj = "<p class='h5'>" + response.obj.company_objective + "</p>"
                $('#company_ObjectiveData').append(company_obj)
            } else if (response.status == 400) {
                var company_obj = "<p class='h5 d-none'>Write your company onjectivea</p>"
                $('#company_ObjectiveData').append(company_obj)
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}