function Objective() {
    $.ajax({
        type: "GET",
        url: "/company-objective",
        data: "data",
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $("#company-objective-content").text(
                    response.objective.company_objective
                );
                $("#company-objective").removeClass("d-none");
            } else if (response.status == 400) {
                $("#company-objective").addClass("d-none");
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseTxt);
        },
    });
}
function WeDO() {
    $.ajax({
        type: "GET",
        url: "/company-do",
        data: "data",
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $("#company-do-content").text(response.wedo.description);
                $("#company-do").removeClass("d-none");
            } else if (response.status == 400) {
                $("#company-do").addClass("d-none");
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseTxt);
        },
    });
}
function Missions() {
    $.ajax({
        type: "GET",
        url: "/company-missions",
        data: "data",
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $.each(response.missions, function (index, data) {
                    var col =
                        "<div div  class='col-lg-6 col-sm-12 mt-2 px-3' > <div class='border-top fw-lighter  border-2 py-3'> <span class='fs-5 text-light'>" +
                        data.description +
                        " </span></div></div>";

                    $("#company-mission-data").append(col);
                });
                $("#company-missions").removeClass("d-none");
            } else if (response.status == 400) {
                $("#company-missions").addClass("d-none");
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseTxt);
        },
    });
}
function Vision() {
    $.ajax({
        type: "GET",
        url: "/company-vision",
        data: "data",
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $("#vision-content").text(response.vision.description);
                $("#company-vision").removeClass("d-none");
            } else if (response.status == 400) {
                $("#company-vision").addClass("d-none");
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseTxt);
        },
    });
}

function Awards() {
    $.ajax({
        type: "GET",
        url: "/company-awards",
        data: "data",
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $.each(response.years, function (index, data) {
                    if (index === 0) {
                        var data =
                            " <div class='mx-1'><button data-id=" +
                            data.year +
                            " class='btn btn-primary px-4 yearBtn' type='button'>" +
                            data.year +
                            "</button></div>";
                        $("#awards-button").append(data);
                        var year = $(".yearBtn").data("id");
                        AwardsData(year);
                    } else {
                        var data =
                            " <div class='mx-1'><button data-id=" +
                            data.year +
                            " class='btn btn-light px-4 yearBtn' type='button'>" +
                            data.year +
                            "</button></div>";
                        $("#awards-button").append(data);
                    }
                });
                $("#company-awards").removeClass("d-none");
            } else if (response.status == 400) {
                $("#company-awards").addClass("d-none");
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseTxt);
        },
    });
}

function AboutBTN() {
    $(document).on("click", ".yearBtn", function (e) {
        e.preventDefault();
        $(".yearBtn").removeClass("btn btn-primary");
        $(".yearBtn").addClass("btn btn-light");
        var year = $(this).data("id");
        $(this).removeClass("btn btn-light");
        $(this).addClass("btn btn-primary");
        AwardsData(year);
    });

    $(document).on("click", ".cityBtn", function (e) {
        e.preventDefault();
        $(".cityBtn").removeClass("btn btn-primary");
        $(".cityBtn").addClass("btn btn-light");
        var city = $(this).data("id");
        console.log(city);
        $(this).removeClass("btn btn-light");
        $(this).addClass("btn btn-primary");
        ProjectsData(city);
    });
}

function AwardsData(year) {
    console.log(year);
    $("#awards-content-data").css({
        height: "15rem",
    });
    $("#awards-content-data").empty();

    $.ajax({
        type: "GET",
        url: "/company-awards/" + year,
        data: "data",
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $.each(response.awards, function (index, data) {
                    var col =
                        "<div div  class='col-lg-6 col-sm-12 mt-2 px-3' ><img class='mx-auto' src='images/" +
                        data.awards_image +
                        "' style='height:200px;' alt='img'> <div class='border-top fw-lighter   border-2 py-3'> <span class='fs-5 text-light'>" +
                        data.awards_title +
                        " </span></div></div>";
                    $("#awards-content-data").append(col);
                    $("#awards-content-data").css({
                        height: "auto",
                    });
                });
            } else if (response.status == 400) {
                var col =
                    "<div div  class='col-lg-6 col-sm-12 mt-2 px-3' > <div class='border-top fw-lighter  border-2 py-3'> <span class='fs-5 text-light'>" +
                    response.message +
                    " </span></div></div>";

                $("#awards-content-data").append(col);
            }
        },
        erro: function (xhr, status, error) {
            console.error(xhr.responseTxt);
        },
    });
}

function Projects() {
    $.ajax({
        type: "GET",
        url: "/company-projects",
        success: function (response) {
            console.log(response);
            if (response.length > 0) {
                $.each(response.city, function (index, data) {
                    if (index === 0) {
                        var data =
                            " <div class='mx-1'><button data-id=" +
                            data.city +
                            " class='btn btn-primary px-4 cityBtn' type='button'>" +
                            data.city +
                            "</button></div>";
                        $("#projects-button").append(data);
                        var city = $(".cityBtn").data("id");
                        ProjectsData(city);
                    } else {
                        var data =
                            " <div class='mx-1'><button data-id=" +
                            data.city +
                            " class='btn btn-light px-4 cityBtn' type='button'>" +
                            data.city +
                            "</button></div>";
                        $("#projects-button").append(data);
                    }
                });
                $("#company-project-portfolio").removeClass("d-none");
            } else {
                $("#company-project-portfolio").addClass("d-none");
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseTxt);
        },
    });
}

function ProjectsData(city) {
    // console.log(city)
    $("#projects-content-data").css({
        height: "15rem",
    });
    $("#projects-content-data").empty();

    $.ajax({
        type: "GET",
        url: "/company-project/data/" + city,
        data: "data",
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $.each(response.projects, function (index, data) {
                    var col =
                        "<div div  class='col-lg-6 col-sm-12 mt-2 px-3' > <div class='border-top fw-lighter   border-2 py-3'> <span class='fs-5 text-light'>" +
                        data.project_name +
                        " </span></div></div>";
                    console.log(data.project_name);
                    $("#projects-content-data").append(col);
                    $("#projects-content-data").css({
                        height: "auto",
                    });
                });
            } else if (response.status == 400) {
                var col =
                    "<div div  class='col-lg-6 col-sm-12 mt-2 px-3' > <div class='border-top fw-lighter  border-2 py-3'> <span class='fs-5 text-light'>" +
                    response.message +
                    " </span></div></div>";

                $("#projects-content-data").append(col);
            }
        },
        erro: function (xhr, status, error) {
            console.error(xhr.responseTxt);
        },
    });
}
