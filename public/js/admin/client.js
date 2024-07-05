$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    Submitted_Properties();

    $(document).on("click", ".show-property-data-btn", function () {
        var id = $(this).data("id");
        $("#client-details").empty();

        $.ajax({
            type: "GET",
            url: `/admin/clients/${id}`,
            success: function (res) {
                // console.log(res);

                var details = `<div class="row">
                    <div class="col-12">
                        <p class="text-center fw-semibold"> Client Information</p>
                        <div class="p">Name: ${res.cfname} ${res.clname}</div>
                        <div class="p">Contact: ${res.ccontact}</div>
                        <div class="p">Email: ${res.cemail}</div>

                        <div class="row">
                            <div class="col-6">
                                <p>Front ID:</p>
                                <img src="/client/${res.cidfront}" height="200" alt="">
                            </div>
                            <div class="col-6">
                                <p>Back ID:</p>
                                <img src="/client/${res.cidback}" height="200" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col mt-4 ">
                        <p class="text-center fw-semibold">Property Information</p>
                        <div class="p">Project: ${res.project}</div>
                        <div class="p">Unit No: ${res.cunit_no}</div>
                        <div class="p">For: ${res.cfor}</div>
                        <div class="p">Type: ${res.ctype}</div>
                        <div class="p">Price: ${res.cprice}</div>
                        <div class="p">Size: ${res.csize}</div>
                        <div class="p">Status: ${res.cstatus}</div>

                    </div>


                </div>
               `;
                $("#client-details").append(details);
                $.each(res.images, function (index, data) {
                    var images = ` <div class="row">
                    <div class="col-3 p-3">
                        <img src="/submitted_properties/${data.image_name}" height="150" alt="">
                    </div>

                </div>`;
                    $("#client-details").append(images);
                });
                $("#submitted-property-modal").modal("show");
            },
        });
    });

    $(document).on("click", ".approve-btn", function () {
        var id = $(this).data("id");
        $.ajax({
            url: `/admin/clients/approve/${id}`,
            type: 'GET',
            success: function (res) {
                showtoastMessage(
                    "text-success",
                    "Submission Success",
                    res.message
                );

                Submitted_Properties();
            },
            error: function (res) {
                console.log(res)
            },
        })  
    })
});
function Submitted_Properties() {
    $(".table-approved-appoinments-display tbody").empty;
    var datatable = $(".table-pending-properties-container");
    datatable.empty();
    var table =
        "<table id='table-approved-appoinments-display' class='table table-stripped border border-bordored w-100'>";
    table += " <thead>";
    table += " <tr>";
    table += `  <th class='text-start'><i class="fa-solid fa-calendar"></i></th>`;
    table += "  <th class='text-center'>Name</th>";
    table += " <th class='text-center'>Details</th>";
    table += " <th class='text-center'>Action</th>";
    table += " </tr>";
    table += "   </thead >";
    table += "   <tbody class='text-nowrap text-center'>";
    table += "</tbody > ";
    table += " </table >";
    datatable.append(table);

    let activated = new DataTable("#table-approved-appoinments-display", {
        ajax: {
            url: "/admin/clients",
            type: "GET",
            dataSrc: "properties",
        },

        columns: [
            {
                data: null,
                render: function (data, type, row) {
                    return `<p class='text-start'><i class="fa-solid fa-calendar"></i></p>`;
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    return `<p class="">${row.cfname} ${row.clname}</p>`;
                },
            },

            {
                data: null,
                render: function (data, type, row) {
                    var status = `<button data-id=${row.client_id} type="button" class="show-property-data-btn text-center btn btn-success">Show Details</button>`;
                    return status;
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    var action = `<button data-id=${row.client_id} type="button" class="approve-btn text-center btn btn-primary">Approve</button>`;
                    return action;
                },
            },
        ],
    });
}

function showtoastMessage(toastColor, toastHeader, toastContent) {
    $("#toast-header").removeClass(toastColor);
    $("#toast-header").addClass(toastColor);
    $("#toast-header").text(toastHeader);
    $("#toast-content").text(toastContent);
    const toastBootstrap = new bootstrap.Toast("#toasMessage");
    toastBootstrap.show();
}
