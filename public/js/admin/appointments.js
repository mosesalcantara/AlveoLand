function Appointment_Event() {
    $(document).on("click", ".view-request-btn", function (e) {
        e.preventDefault();

        var id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: `/show-appoitnment-details/${id}`,
            success: function (res) {
                $("#vistation-deatails").empty();

                console.log(res);
                var buttons =
                    res.status == "Approved"
                        ? `<button type="button" data-id="${res.id}" data-value='Done' class='process-btn btn btn-primary me-3'>Done</button>`
                        : `<button type="button" data-id="${res.id}" data-value='Approve' class='process-btn btn btn-primary me-3'>Approve</button>
                    <button type="button" data-id="${res.id}" data-value='Decline' class='process-btn btn btn-danger'>Decline</button>`;
                var details = `     <div class="col-12 text-center mb-3">
<img src="/project/units/snapshots/${
                    res.unit.project_unit_banner
                }" height="300">
                    </div>
                <div class="col-6 lh-1 text-end">
                        <p class="fw-semibold text-primary">Project</p>
                        <p class="fw-semibold text-primary">Unit</p>
                        <p class="fw-semibold text-primary">Type</p>
                        <p class="fw-semibold text-primary">Category</p>
                        <p class="fw-semibold text-primary">Category Type</p>
                        <p class="fw-semibold text-primary">Requester</p>
                        <p class="fw-semibold text-primary">Contact</p>
                        <p class="fw-semibold text-primary">Date</p>
                        <p class="fw-semibold text-primary">Time</p>
                    </div>
                    <div class="col-6 lh-1">
                        <p class="fw-semibold text-warning">: ${
                            res.project.project_name
                        }</p>
                        <p class="fw-semibold text-warning">: ${
                            res.unit.project_unit_no
                        }</p>
                        <p class="fw-semibold text-warning">: ${
                            res.unit.project_unit_type
                        }</p>
                        <p class="fw-semibold text-warning">: ${
                            res.unit.project_unit_category_type
                        }</p>
                        <p class="fw-semibold text-warning">: ${
                            res.unit.project_unit_category_description
                        }</p>
                           <p class="fw-semibold text-warning">: ${
                               res.full_name
                           }</p>
                           <p class="fw-semibold text-warning">: ${
                               res.contact
                           }</p>
                        <p class="fw-semibold text-warning">: ${convertDateToWords(
                            res.date
                        )}</p>
                     
                        <p class="fw-semibold text-warning">: ${convertTo12HourFormat(
                            res.time
                        )}</p>
                    </div>
                    <div class="col-12">
                    <div class='d-flex justify-content-center'>
                    ${buttons}
                    </div>
                    `;
                $("#vistation-deatails").append(details);
                $("#view-request-modal").modal("show");
            },
        });
    });

    $(document).on("click", ".process-btn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        var value = $(this).data("value");
        if (value == "Approve") {
            $.ajax({
                type: "GET",
                url: `/approve-appointment/${id}`,
                success: function (res) {
                    showtoastMessage("text-success", "Success", res.message);
                    DisplayOnGoingAppointments();
                    DisplayPendngAppointments();
                    DashApp();
                    $("#view-request-modal").modal("hide");
                },
            });
        } else if (value == "Decline") {
            $.ajax({
                type: "GET",
                url: `/decline-appointment/${id}`,
                success: function (res) {
                    showtoastMessage("text-success", "Success", res.message);
                    DisplayOnGoingAppointments();
                    DisplayPendngAppointments();
                    DashApp();
                    $("#view-request-modal").modal("hide");
                },
            });
        } else if (value == "Done") {
            $.ajax({
                type: "GET",
                url: `/complete-appointment/${id}`,
                success: function (res) {
                    showtoastMessage("text-success", "Success", res.message);
                    DisplayOnGoingAppointments();
                    DisplayPendngAppointments();
                    DashApp();
                    $("#view-request-modal").modal("hide");
                },
            });
        }
    });
}
function DashApp() {
    $.ajax({
        type: "GET",
        url: "/approved-appointments",
        success: function (res) {
            res.approved.length > 0
                ? $("#approved-request-count").text(res.approved.length)
                : $("#approved-request-count").text("0");
        },
    });
    $.ajax({
        type: "GET",
        url: "/pending-appointments",
        success: function (res) {
            res.pending.length > 0
                ? $("#pending-request-count").text(res.pending.length)
                : $("#pending-request-count").text("0");
        },
    });
    $.ajax({
        type: "GET",
        url: "/completed-appointments",
        success: function (res) {
            res.completed.length > 0
                ? $("#completed-request-count").text(res.completed.length)
                : $("#completed-request-count").text("0");
        },
    });
}
function DisplayOnGoingAppointments() {
    $(".table-approved-appoinments-display tbody").empty;
    var datatable = $(".table-approve-appointments-container");
    datatable.empty();
    var table =
        "<table id='table-approved-appoinments-display' class='table table-stripped border border-bordored w-100'>";
    table += " <thead>";
    table += " <tr>";
    table += `  <th class='text-start'><i class="fa-solid fa-calendar"></i></th>`;
    table += "  <th class='text-start'>Name</th>";
    table += "  <th>Date.</th>";
    table += " <th>Time</th>";
    table += " <th class='text-center'>Details</th>";
    table += " </tr>";
    table += "   </thead >";
    table += "   <tbody class='text-nowrap'>";
    table += "</tbody > ";
    table += " </table >";
    datatable.append(table);

    let activated = new DataTable("#table-approved-appoinments-display", {
        ajax: {
            url: "/approved-appointments",
            type: "GET",
            dataSrc: "approved",
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
                    return '<p class="">' + row.full_name + "</p>";
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    return (
                        '<p class="">' + convertDateToWords(row.date) + "</p>"
                    );
                },
            },

            {
                data: null,
                render: function (data, type, row) {
                    return '<p class="">' + convertTo12HourFormat(row.time);
                    +"</p>";
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    var status = `<div class="text-center"><p data-id="${row.id}" style='cursor:pointer' class='view-request-btn bg-success rounded-1 py-1'>View</p></div>`;
                    return status;
                },
            },
        ],
    });
}

function DisplayPendngAppointments() {
    $(".table-pending-appoinments-display tbody").empty;
    var datatable = $(".table-pending-appointments-container");
    datatable.empty();
    var table =
        "<table id='table-pending-appoinments-display' class='table table-stripped border border-bordored w-100'>";
    table += " <thead>";
    table += " <tr>";
    table += `  <th class='text-start'><i class="fa-solid fa-calendar"></i></th>`;
    table += "  <th class='text-start'>Name</th>";
    table += "  <th>Date.</th>";
    table += " <th>Time</th>";
    table += " <th class='text-center'>Details</th>";
    table += " </tr>";
    table += "   </thead >";
    table += "   <tbody class='text-nowrap'>";
    table += "</tbody > ";
    table += " </table >";
    datatable.append(table);

    let activated = new DataTable("#table-pending-appoinments-display", {
        ajax: {
            url: "/pending-appointments",
            type: "GET",
            dataSrc: "pending",
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
                    return '<p class="">' + row.full_name + "</p>";
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    return (
                        '<p class="">' + convertDateToWords(row.date) + "</p>"
                    );
                },
            },

            {
                data: null,
                render: function (data, type, row) {
                    return '<p class="">' + convertTo12HourFormat(row.time);
                    +"</p>";
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    var status = `<div class="text-center"><p data-id="${row.id}" style='cursor:pointer' class='view-request-btn bg-primary rounded-1 py-1'>View</p></div>`;
                    return status;
                },
            },
        ],
    });
}

function convertDateToWords(date) {
    // If date is a string, parse it into a Date object
    if (typeof date === "string") {
        date = new Date(date);
    }

    // Convert month from number to word
    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    const month = months[date.getMonth()];

    // Convert day and year to words
    const day = date.getDate();
    const year = date.getFullYear();

    // Construct the converted date string
    const convertedDate = `${month} ${day}, ${year}`;

    // Return the converted date string
    return convertedDate;
}

function convertTo12HourFormat(time24) {
    // Split the time into hours and minutes
    var splitTime = time24.split(":");
    var hours = parseInt(splitTime[0]);
    var minutes = parseInt(splitTime[1]);

    // Determine AM or PM
    var period = hours >= 12 ? "PM" : "AM";

    // Convert hours to 12-hour format
    hours = hours % 12;
    hours = hours ? hours : 12; // Handle midnight (0 hours)

    // Format the time
    var time12 =
        hours + ":" + (minutes < 10 ? "0" : "") + minutes + " " + period;

    return time12;
}

function showtoastMessage(toastColor, toastHeader, toastContent) {
    $("#toast-header").removeClass(toastColor);
    $("#toast-header").addClass(toastColor);
    $("#toast-header").text(toastHeader);
    $("#toast-content").text(toastContent);
    const toastBootstrap = new bootstrap.Toast("#toasMessage");
    toastBootstrap.show();
}
