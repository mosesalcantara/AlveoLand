const id = localStorage.getItem("project_id");
const unit_id = localStorage.getItem("project_unit_id");

let money = new Intl.NumberFormat("fil-PH", {
    style: "currency",
    currency: "PHP",
});

function showtoastMessage(toastColor, toastHeader, toastContent) {
    $("#toast-header").removeClass(toastColor);
    $("#toast-header").addClass(toastColor);
    $("#toast-header").text(toastHeader);
    $("#toast-content").text(toastContent);
    const toastBootstrap = new bootstrap.Toast("#toasMessage");
    toastBootstrap.show();
}

function UnitsEvents() {
    $(document).on("click", ".visit-unit-btn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        localStorage.removeItem("project_unit_id");
        localStorage.setItem("project_unit_id", id);
        window.location.href = "/view-units";
    });

    $(document).on("click", ".schedule-btn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $("input[name=unit_id]").val(id);
        $("#schedule_visit_modal").modal("show");
    });
    $("#schedule_form").submit(function (e) {
        e.preventDefault();
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var formdata = new FormData($(this)[0]);
        $("#schedule_form span").remove();
        $.ajax({
            type: "POST",
            url: "/create-schedule-visit",
            data: formdata,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (res) {
                if (res.status == 200) {
                    showtoastMessage("text-success", "Success", res.message);
                    $("#schedule_form")[0].reset();
                } else if (res.status == 400) {
                    if (res.message) {
                        showtoastMessage("text-danger", "Failed", res.message);
                    }
                    $.each(res.errors, function (errIndex, errData) {
                        $(
                            "<span class='text-danger'>" + errData + "</span>"
                        ).insertAfter(
                            $("#schedule_form input[name=" + errIndex + "]")
                        );
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseTxt);
            },
        });
    });
}

function Sale_Units() {
    $(document).on("click", ".display-sale-units", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        localStorage.removeItem("project_id");
        localStorage.setItem("project_id", id);
    });
}

function Get_Unit_Data() {
    $.ajax({
        type: "GET",
        url: "/project-unit-information/" + unit_id,
        data: "data",
        dataType: "json",
        success: function (res) {
            console.log(res);
            if (res.status == 200) {
                var data = ` <div class="  overflow-auto"
        style='cursor:pointer;background: linear-gradient(to bottom, rgba(7, 148, 236, 0.7), rgba(255, 255, 255, 0.001)), url("/project/snapshots/${
            res.unit.project_banner
        }");
                                                                height:80vh; background-size:cover; background-repeat:no-repeat'>
        <div class="row h-100 py-3">
            <div class="col-1"></div>
            <div class="col-10 bg-light p-3">
                <div class="row">
                    <div class="col-8">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div id="unit-images" class="carousel-inner">
                            
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <h5 class="text-dark">${res.unit.project_name}</h5>
                        <img src="/project/units/snapshots/${
                            res.unit.project_unit_banner
                        }" height="100" alt="">
                        <p class="text-center text-warning  mt-3 fw-bold">Information</p>
                        <div class="row text-center mt-3">
                            <div class="col-6 pe-3 border-end border-warning border-3 text-end lh-1">
                                <p><strong class="text-dark"> Unit No.:</strong></p>
                                <p><strong class="text-dark"> Unit Type:</strong></p>
                                <p><strong class="text-dark"> Unit Status:</strong></p>
                                <p><strong class="text-dark"> Unit Price:</strong></p>
                                <p><strong class="text-dark"> Unit Size:</strong></p>
                            </div>
                            <div class="col-6 text-start lh-1">
                                <p><strong class="text-primary"> ${
                                    res.unit.project_unit_no
                                }</strong></p>
                                <p><strong class="text-dark"><span class="bg-warning p-1 fw-semibold">
                                            ${
                                                res.unit.project_unit_type
                                            }</span></strong>
                                </p>
                                <p><strong class="text-light"> <span class="bg-success p-1">${
                                    res.unit.project_unit_status
                                }</span></strong></p>
                                <p><strong class="text-primary">${money.format(
                                    res.unit.project_unit_price
                                )}</strong></p>
                                <p><strong class="text-primary"> ${
                                    res.unit.project_unit_size
                                } sqm</strong></p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p  data-id="${
                                res.unit.id
                            }" class="text-light px-3 py-1 btn btn-success schedule-btn ">Schedule a Visit</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>`;
                $(".unit-data-view").append(data);
                $.each(res.unit.imgs, function (imgIndex, imgdata) {
                    var active = "";
                    if (imgIndex == 0) {
                        active = "active";
                    } else {
                        active = "";
                    }
                    var img = `<div class="img-car carousel-item  ${active}">
      <img src="/project/units/snapshots/${imgdata.project_unit_snapshot_name}" class=" w-100" >
    </div>`;
                    $("#unit-images").append(img);
                });
            }
        },
    });
}

function Display_Project_Units() {
    $("#display-project-properties").empty();
    $.ajax({
        type: "GET",
        url: "/project/all-units/" + id,
        data: "data",
        dataType: "json",
        success: function (res) {
            console.log(res);
            if (res.status == 200) {
                var top = `    <div class=""
            style='cursor:pointer;background: linear-gradient(to top, rgba(7, 148, 236, 0.7), rgba(255, 255, 255, 0.001)), url("/project/snapshots/${res.project.project_banner}");
                                                                height:50vh; background-size:cover; background-repeat:no-repeat'>
        </div>
        <div class="p-3">
            <h1 class="text-center" style="olor:rgb(25, 69, 107)"><i class="fa-solid fa-building"></i></h1>
            <h1 class="text-center  fw-bold" style="color:rgb(25, 69, 107)">${res.project.project_name} Properties</h1>
            <h3 style="color:rgb(25, 69, 107)" class="fw-semibold text-center"><span class="me-2"><i
                        class="fa-solid fa-location-dot"></i></span> ${res.project.street} | Brgy. ${res.project.barangay} | ${res.project.city},
                </h3>
        </div>`;
                $(".sale-top-details").append(top);

                $.each(res.units, function (unitIndex, unitData) {
                    let money = new Intl.NumberFormat("fil-PH", {
                        style: "currency",
                        currency: "PHP",
                    });

                    var price = money.format(unitData.project_unit_price);
                    var sqm = unitData.project_unit_price;
                    var unit_size = sqm.toLocaleString();
                    var color =
                        unitData.project_unit_status == "Available"
                            ? (color = "success")
                            : "danger";

                    var icon = "";
                    var card = ` <div class="col-lg-3 col-sm-12 p-2">
                <div class="card p-0">
                    <div class="card-body p-0 border-0"
                        style='cursor:pointer;background: linear-gradient(to top, rgba(7, 148, 236, 0.9), rgba(255, 255, 255, 0.001)), url("/project/units/snapshots/${unitData.project_unit_banner}");
                                                                height:25rem; background-size:cover;'>
                        <br>
                        <br>
                        <br>
                        <div class="clearfix">
                            <h6 class="float-end"> <span class="bg-warning rounded-start  fw-semibold  px-3 py-2"><span
                                        class="me-3"></span>${unitData.project_unit_category_type}</span>
                            </h6>
                        </div>
                        <br>
                        <div class="clearfix">
                            <h3 class="float-start"> <span class="bg-light rounded-end  fw-semibold  px-3 py-2"><span
                                        class="me-3"><i class="fa-solid fa-location-dot"></i></span>${unitData.city}</span>
                            </h3>
                        </div>
                        <br>
                        <div class="clearfix">
                            <h6 class="float-start"><span
                                    class="bg-${color} text-light rounded-end     px-3 py-2">${unitData.project_unit_status}</span>
                            </h6>
                        </div><br>
                        <br>
                        <br>
                        <br>
                        <div class=" text-center">
                            <h6 class="text-light my-3  "><span class="bg-primary fw-semibold p-2"> ${unitData.project_unit_category_description}</span></h6>
                            <h6 class="text-light "> <span class="fw-semibold ">
                                    ${unitData.project_unit_type} | ${unitData.project_unit_size} sqm. | ${price}</span></h6>
                            <br>
                            <div data-id="${unitData.id}" class="visit-unit-btn  btn btn-light fw-semibold px-5">Visit</div>

                        </div>

                    </div>
                </div>
            </div>`;
                    $("#display-project-units-properties").append(card);
                });
            }
        },
    });
}
