$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(".reset-form-btn").click(function (e) {
        e.preventDefault();
        $("#lease-search-filter")[0].reset();
        Display_Project_Lease_Units();
    });
    $(document).on("submit", "#lease-search-filter", function (e) {
        e.preventDefault();
        $("#display-project-lease-units").empty();
        $.ajax({
            url: `/search-lease`,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.length > 0) {
                    $(".property-count").text(res.length);
                    $.each(res, function (unitIndex, unitData) {
                        let money = new Intl.NumberFormat("fil-PH", {
                            style: "currency",
                            currency: "PHP",
                        });

                        var unitprice =
                            unitData.project_unit_category_type == "Lease"
                                ? money.format(unitData.project_unit_price) +
                                  "/ month"
                                : money.format(unitData.project_unit_price);
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
                                    ${unitData.project_unit_type} | ${unitData.project_unit_size} sqm. | ${unitprice}</span></h6>
                            <br>
                            <div data-id="${unitData.id}" class="visit-unit-btn  btn btn-light fw-semibold px-5">Visit</div>

                        </div>

                    </div>
                </div>
            </div>`;
                        $("#display-project-lease-units").append(card);
                    });
                } else {
                    $(".property-count").text(res.length);
                }
            },
            error: function (res) {
                console.log(res);
                var errors = res.responseJSON.errors;

                var inputs = $(
                    "#addForm input, #addForm select, #addForm textarea"
                );
                for (input of inputs) {
                    var name = $(input).attr("name");

                    if (name in errors) {
                        for (error of errors[name]) {
                            var error_msg = $(
                                `<span class='text-danger'>${error}</span>`
                            );
                            error_msg.insertAfter($(input));
                        }
                    }
                }
            },
        });
    });
});

function UnitsEvents() {
    $(document).on("click", ".visit-unit-btn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        localStorage.removeItem("project_unit_id");
        localStorage.setItem("project_unit_id", id);
        window.location.href = "/view-units";
    });
}

function Display_Project_Lease_Units() {
    $("#display-project-lease-units").empty();
    $.ajax({
        type: "GET",
        url: "/project/lease-units",
        data: "data",
        dataType: "json",
        success: function (res) {
            console.log(res);
            if (res.status == 200) {
                $(".property-count").text(res.units.length);
                $.each(res.units, function (unitIndex, unitData) {
                    var unitprice =
                        unitData.project_unit_category_type == "Lease"
                            ? money.format(unitData.project_unit_price) +
                              "/ month"
                            : money.format(unitData.project_unit_price);

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
                                    ${unitData.project_unit_type} | ${unitData.project_unit_size} sqm. | ${unitprice}</span></h6>
                            <br>
                            <div data-id="${unitData.id}" class="visit-unit-btn  btn btn-light fw-semibold px-5">Visit</div>

                        </div>

                    </div>
                </div>
            </div>`;
                    $("#display-project-lease-units").append(card);
                });
            }
        },
    });
}

let money = new Intl.NumberFormat("fil-PH", {
    style: "currency",
    currency: "PHP",
});
