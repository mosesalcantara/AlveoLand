let money = new Intl.NumberFormat("fil-PH", {
    style: "currency",
    currency: "PHP",
});

function Project_Events() {
    $(document).on("click", ".change-status-btn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        console.log(id);
        $.ajax({
            type: "GET",
            url: `/change-project-status/${id}`,
            success: function (res) {
                if (res.status == 200) {
                    showtoastMessage("text-success", "Updated", res.message);
                    Property_Table();
                }
            },
        });
    });

    $(document).on("click", ".edit-project-btn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $("input[name=id]").val(id);
        $.ajax({
            type: "GET",
            url: `/edit-project-data/${id}`,
            success: function (res) {
                console.log(res);
                if (res.status == 200) {
                    $(`#update-project-form input[name=project_name]`).val(
                        res.project.project_name
                    );
                    $(
                        `#update-project-form textarea[name=project_tagline]`
                    ).val(res.project.project_tagline);
                    $(`#update-project-form input[name=province]`).val(
                        res.project.province
                    );
                    $("#project-logo").attr(
                        "src",
                        `/project/snapshots/${res.project.project_logo}`
                    );
                    $("#project-banner").attr(
                        "src",
                        `/project/snapshots/${res.project.project_banner}`
                    );
                    $(`#update-project-form input[name=city]`).val(
                        res.project.city
                    );
                    $(`#update-project-form input[name=barangay]`).val(
                        res.project.barangay
                    );
                    $(`#update-project-form input[name=street]`).val(
                        res.project.street
                    );
                    $("#update-project-modal").modal("show");
                }
            },
        });
    });

    $("#create-project-btn").click(function (e) {
        e.preventDefault();
        $("#create-project-modal").modal("show");
    });
    $("#create-project-clear-btn").click(function (e) {
        e.preventDefault();
        $("#create-project-form")[0].reset();
    });
    $(document).on("click", ".project-units-show", function () {
        var id = $(this).data("id");
        localStorage.removeItem("id");
        localStorage.setItem("id", id);
        var unit = localStorage.getItem("id");
        $("#project-header-text").text("Units");
        Display_Project_Units(unit);
    });
    $("#create-project-unit-modal").on("change", function (e) {
        e.preventDefault();
        console.log($(this).val());
    });
    $(document).on("click", ".upload-file-btn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $("input[name=project_properties_id]").val(id);
        $("#create-project-snapshots-videos-modal").modal("show");
    });
    $(document).on("click", ".upload-unit-file-btn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $("input[name=project_units_id]").val(id);
        $("#create-project-unit-snapshots-videos-modal").modal("show");
    });
}
function CreateUnit() {
    $("#create-project-unit-form").submit(function (e) {
        e.preventDefault();
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var formdata = new FormData($(this)[0]);
        $("#create-project-unit-form span").remove();
        $.ajax({
            type: "POST",
            url: "/admin/project-create-unit",
            data: formdata,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (res) {
                if (res.status == 200) {
                    showtoastMessage("text-success", "Success", res.message);
                    $("#create-project-unit-form")[0].reset();
                    Display_Project_Units();
                } else if (res.status == 400) {
                    if (res.message) {
                        showtoastMessage("text-danger", "Failed", res.message);
                    }
                    $.each(res.errors, function (errIndex, errData) {
                        $(
                            "<span class='text-danger'>" + errData + "</span>"
                        ).insertAfter(
                            $(
                                "#create-project-unit-form input[name=" +
                                    errIndex +
                                    "]"
                            )
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
function Unit_Project_Events() {
    $(document).on("click", ".update-unit-status-btn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        console.log(id);
        $.ajax({
            type: "GET",
            url: `/change-unit-status/${id}`,
            success: function (res) {
                if (res.status == 200) {
                    showtoastMessage("text-success", "Updated", res.message);
                    Display_Project_Units();
                }
            },
        });
    });

    $(document).on("click", ".edit-unit-btn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");

        $.ajax({
            type: "GET",
            url: `/edit-project-unit-data/${id}`,
            success: function (res) {
                console.log(res);
                if (res.status == 200) {
                    $("#update-project-unit-form input[name=id]").val(
                        res.units.id
                    );
                    $(
                        "#update-project-unit-form input[name=project_unit_no]"
                    ).val(res.units.project_unit_no);
                    $(
                        "#update-project-unit-form input[name=project_unit_size]"
                    ).val(res.units.project_unit_size);
                    $(
                        "#update-project-unit-form input[name=project_unit_price]"
                    ).val(res.units.project_unit_price);
                    var cattype = $("<option selected>");
                    cattype.val(res.units.project_unit_category_type);
                    cattype.text(res.units.project_unit_category_type);
                    $(
                        "#update-project-unit-form select[name=project_unit_category_type]"
                    ).append(cattype);
                    var cattypedes = $("<option selected>");
                    cattypedes.val(res.units.project_unit_category_description);
                    cattypedes.text(
                        res.units.project_unit_category_description
                    );
                    $(
                        "#update-project-unit-form select[name=project_unit_category_description]"
                    ).append(cattypedes);
                    var unitType = $("<option selected>");
                    unitType.val(res.units.project_unit_type);
                    unitType.text(res.units.project_unit_type);
                    $(
                        "#update-project-unit-form select[name=project_unit_type]"
                    ).append(unitType);

                    for (project_names of res.units.projects) {
                        var selected =
                            res.units.project_properties_id == project_names.id
                                ? "selected"
                                : "";

                        var project_name = $(`<option ${selected}>`);
                        project_name.val(project_names.id);
                        project_name.text(project_names.project_name);
                        $(
                            "#update-project-unit-form select[name=project_name]"
                        ).append(project_name);
                    }

                    $("#update-project-unit-modal").modal("show");
                }
            },
        });
    });

    $("#create-project-unit-btn").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "/admin/project-data",
            data: "data",
            dataType: "json",
            success: function (res) {
                console.log(res);
                if (res.status == 200) {
                    var select = $(
                        "#create-project-unit-modal select[name=project_name]"
                    );
                    select.empty();
                    select.append("<option>Choose</option>");
                    $.each(res.projects, function (proIndex, proData) {
                        select.append(
                            "<option value='" +
                                proData.id +
                                "'>" +
                                proData.project_name +
                                "</option>"
                        );
                    });
                    $("#create-project-unit-modal").modal("show");
                } else if (res.status == 400) {
                    showtoastMessage(
                        "text-danger",
                        "Failed",
                        "No projects created yet"
                    );
                }
            },
        });
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

function Create() {
    $("#create-project-form").submit(function (e) {
        e.preventDefault();
        $("#create-project-form button[type=submit]").prop("disabled", true);
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "/admin/create-project",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (res) {
                $("#create-project-form span").remove();
                $("#create-project-form button[type=submit]").prop(
                    "disabled",
                    false
                );
                if (res.status == 200) {
                    showtoastMessage("text-success", "Success", res.message);
                    $("#create-project-form")[0].reset();
                    Property_Table();
                } else if (res.status == 400) {
                    $.each(res.errors, function (errors, error) {
                        $(
                            "<span class='text-danger'>" + error + "</span>"
                        ).insertAfter($("input[name=" + errors + "]"));
                    });
                }
            },
            error: function (xhr, status, error) {
                $("#create-project-form span").remove();
                $("#create-project-form button[type=submit]").prop(
                    "disabled",
                    false
                );
                console.error(xhr.responseTxt);
            },
        });
    });
}

function Update_Project() {
    $("#update-project-form").submit(function (e) {
        e.preventDefault();
        $("#update-project-form button[type=submit]").prop("disabled", true);
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "/admin/update-project",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (res) {
                console.log(res);
                $("#update-project-form span").remove();
                $("#update-project-form button[type=submit]").prop(
                    "disabled",
                    false
                );
                if (res.status == 200) {
                    showtoastMessage("text-success", "Success", res.message);
                    $("#update-project-form")[0].reset();
                    $("#update-project-modal").modal("hide");
                    Property_Table();
                } else if (res.status == 400) {
                    if (res.message) {
                        showtoastMessage("text-success", "Failed", res.message);
                    }
                    $.each(res.errors, function (errors, error) {
                        $(
                            "<span class='text-danger'>" + error + "</span>"
                        ).insertAfter($("input[name=" + errors + "]"));
                    });
                }
            },
            error: function (xhr, status, error) {
                $("#update-project-form span").remove();
                $("#update-project-form button[type=submit]").prop(
                    "disabled",
                    false
                );
                console.error(xhr.responseTxt);
            },
        });
    });
}

function Update_Unit_Details() {
    $("#update-project-unit-form").submit(function (e) {
        e.preventDefault();
        $("#update-project-unit-form button[type=submit]").prop(
            "disabled",
            true
        );
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "/admin/update-project-unit",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (res) {
                console.log(res);
                $("#update-project-unit-form span").remove();
                $("#update-project-unit-form button[type=submit]").prop(
                    "disabled",
                    false
                );
                if (res.status == 200) {
                    showtoastMessage("text-success", "Success", res.message);
                    $("#update-project-unit-form")[0].reset();
                    $("#update-project-unit-modal").modal("hide");
                    Display_Project_Units();
                } else if (res.status == 400) {
                    if (res.message) {
                        showtoastMessage("text-success", "Failed", res.message);
                    }
                    $.each(res.errors, function (errors, error) {
                        $(
                            "<span class='text-danger'>" + error + "</span>"
                        ).insertAfter($("input[name=" + errors + "]"));
                    });
                }
            },
            error: function (xhr, status, error) {
                $("#update-project-unit-form span").remove();
                $("#update-project-unit-form button[type=submit]").prop(
                    "disabled",
                    false
                );
                console.error(xhr.responseTxt);
            },
        });
    });
}

function Upload_Snap_Vid() {
    $("#create-project-snapvid-form").submit(function (e) {
        e.preventDefault();
        $("#create-project-snapvid-form button[type=submit]").prop(
            "disabled",
            true
        );
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "/admin/project/upload",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (res) {
                console.log(res);
                $("#create-project-snapvid-form span").remove();
                $("#create-project-snapvid-form button[type=submit]").prop(
                    "disabled",
                    false
                );
                if (res.status == 200) {
                    console.log("hello");
                    showtoastMessage("text-success", "Success", res.message);
                    $("#create-project-snapvid-form")[0].reset();
                    Property_Table();
                } else if (res.status == 400) {
                    $.each(res.errors, function (errors, error) {
                        $(
                            "<span class='text-danger'>" + error + "</span>"
                        ).insertAfter($("input[name=" + errors + "]"));
                    });
                }
            },
            error: function (xhr, status, error) {
                $("#create-project-snapvid-form span").remove();
                $("#create-project-snapvid-form button[type=submit]").prop(
                    "disabled",
                    false
                );
                console.error(xhr.responseTxt);
            },
        });
    });
    $("#create-project-unit-snapvid-form").submit(function (e) {
        e.preventDefault();
        $("#create-project-unit-snapvid-form button[type=submit]").prop(
            "disabled",
            true
        );
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "/admin/project/unit/upload",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (res) {
                console.log(res);
                $("#create-project-unit-snapvid-form span").remove();
                $("#create-project-unit-snapvid-form button[type=submit]").prop(
                    "disabled",
                    false
                );
                if (res.status == 200) {
                    console.log("hello");
                    showtoastMessage("text-success", "Success", res.message);
                    $("#create-project-unit-snapvid-form")[0].reset();
                    Display_Project_Units();
                } else if (res.status == 400) {
                    $.each(res.errors, function (errors, error) {
                        $(
                            "<span class='text-danger'>" + error + "</span>"
                        ).insertAfter($("input[name=" + errors + "]"));
                    });
                }
            },
            error: function (xhr, status, error) {
                $("#create-project-unit-snapvid-form span").remove();
                $("#create-project-unit-snapvid-form button[type=submit]").prop(
                    "disabled",
                    false
                );
                console.error(xhr.responseTxt);
            },
        });
    });
}

function Property_Table() {
    $(".table-property-container tbody").empty;
    var datatable = $(".table-property-container");
    datatable.empty();
    var table =
        "<table id='property-data-table' class='table table-stripped border border-bordored w-100'>";
    table += " <thead>";
    table += " <tr>";
    table += " <th class='text-start'>Logo</th>";
    table += " <th class='text-start'>Banner</th>";
    table += "  <th class='text-center'>Name</th>";
    table += " <th class='text-center'>City</th>";
    table += " <th class='text-center'>File</th>";
    table += " <th class='text-center'>Update</th>";
    table += " <th class='text-center'>Display</th>";
    table += " </tr>";
    table += "   </thead >";
    table += "   <tbody>";
    table += "</tbody > ";
    table += " </table >";
    datatable.append(table);

    let activated = new DataTable("#property-data-table", {
        ajax: {
            url: "/admin/project-data",
            type: "GET",
            dataSrc: "projects",
        },
        columns: [
            {
                data: null,
                render: function (data, type, row) {
                    var banner =
                        "<div class='text-start'><img style='height:50px; '  src='/project/snapshots/" +
                        row.project_logo +
                        "')></div>";
                    return banner;
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    var banner =
                        "<div class='text-start'><img style='height:50px; '  src='/project/snapshots/" +
                        row.project_banner +
                        "')></div>";
                    return banner;
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    return (
                        '<p class="text-center">' + row.project_name + "</p>"
                    );
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    return '<p class="text-center">' + row.city + "</p>";
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    var snapshots =
                        "<div class='text-center'> <button data-id='" +
                        row.id +
                        "' class='upload-file-btn btn btn-secondary ' type='button'>Upload</button></div>";
                    return snapshots;
                },
            },

            {
                data: null,
                render: function (data, type, row) {
                    var edit =
                        "<div class='text-center'> <button data-id='" +
                        row.id +
                        "' class='edit-project-btn btn btn-warning ' type='button'>Edit</button></div>";
                    return edit;
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    var snapshots =
                        row.status == "Unpublished"
                            ? `<div class='text-center'> <button data-id='${row.id}' class='change-status-btn btn btn-success ' type='button'>Publish</button></div>`
                            : `<div class='text-center'> <button data-id='${row.id}' class='change-status-btn btn btn-primary ' type='button'>Unpublished</button></div>`;

                    return snapshots;
                },
            },
        ],
    });
}
function Display_Project_Units() {
    $(".project-unit-data-table tbody").empty;
    var datatable = $(".table-project-unit-container");
    datatable.empty();
    var table =
        "<table id='project-unit-data-table' class='table table-stripped border border-bordored w-100'>";
    table += " <thead>";
    table += " <tr>";
    table += " <th class='text-left'>Banner</th>";
    table += "  <th>Project</th>";
    table += "  <th>Unit No.</th>";
    table += " <th>Type</th>";
    table += " <th class='text-center'>Price</th>";
    table += " <th class='text-center'>Status</th>";
    table += " <th class='text-center'>Update</th>";
    table += " <th class='text-center'>File</th>";
    table += " </tr>";
    table += "   </thead >";
    table += "   <tbody>";
    table += "</tbody > ";
    table += " </table >";
    datatable.append(table);

    let activated = new DataTable("#project-unit-data-table", {
        ajax: {
            url: "/admin/project-units",
            type: "GET",
            dataSrc: "units",
        },
        columns: [
            {
                data: null,
                render: function (data, type, row) {
                    var banner =
                        "<div class='text-start'><img style='height:50px; '  src='/project/units/snapshots/" +
                        row.project_unit_banner +
                        "'></div>";
                    return banner;
                },
            },

            {
                data: null,
                render: function (data, type, row) {
                    return '<p class="">' + row.project_name + "</p>";
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    return '<p class="">' + row.project_unit_no + "</p>";
                },
            },

            {
                data: null,
                render: function (data, type, row) {
                    return '<p class="">' + row.project_unit_type + "</p>";
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    return (
                        '<p class="text-center">' +
                        money.format(row.project_unit_price) +
                        "</p>"
                    );
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    var color = ""; // Define color variable here based on your logic
                    var status =
                        row.project_unit_status == "Available"
                            ? `<div class="text-center"><p data-id="${row.id}" style='cursor:pointer' class='update-unit-status-btn bg-success rounded-1 py-1'>${row.project_unit_status}</p></div>`
                            : `<div class="text-center"><p data-id="${row.id}" style='cursor:pointer' class='update-unit-status-btn bg-warning rounded-1 py-1'>${row.project_unit_status}</p></div>`;
                    return status;
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    var snapshots =
                        "<div class='text-center'> <button data-id='" +
                        row.id +
                        "' class='edit-unit-btn btn btn-primary ' type='button'>Edit</button></div>";
                    return snapshots;
                },
            },

            {
                data: null,
                render: function (data, type, row) {
                    var snapshots =
                        "<div class='text-center'> <button data-id='" +
                        row.id +
                        "' class='upload-unit-file-btn btn btn-secondary ' type='button'>Upload</button></div>";
                    return snapshots;
                },
            },
        ],
    });
}
