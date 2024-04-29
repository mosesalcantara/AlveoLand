function Inquiry_Event() {
    $(document).on("click", ".view-inquiry-btn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: `/view-inquiry-details/${id}`,
            success: function (res) {
                $("#inquiry-deatails").empty();

                console.log(res);
                var details = `       
                <div class="col-4 text-end">
                        <p>Type of Inquiry :</p>
                        <p>Name :</p>
                        <p>Age :</p>
                        <p>Contact :</p>
                        <p>Email :</p>
                        <p>Message :</p>
                    </div>
                    <div class="col-8">
                        <p>${res.type_of_inquiry}</p>
                        <p>${res.identicality}. ${res.f_name}  ${res.l_name}</p>
                        <p>${res.age}</p>
                        <p>${res.phone_num}</p>
                        <p>${res.email}</p>
                        <p>${res.message}</p>
                    </div>
                    <div class='col-12'>
                    <form id="send_response" enctype="multipart/form-data">
                    <input type='hidden' name='id' value='${res.id}'>
                    <input type='hidden' name='email' value='${res.email}'>
                    <div class="form-floating mb-2">
                        <textarea class="form-control" name="replymessage" placeholder="..." id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Write your response here</label>
                        </div>
                        <div class='text-center'><button class="btn btn-primary" type="submit">Send</button></div>
                </form>
                    </div>
                    `;

                $("#inquiry-deatails").append(details);
                $("#view-inquiry-modal").modal("show");
            },
        });
    });

    $(document).on("submit", "#send_response", function (e) {
        e.preventDefault();
        $("#send_response span").remove();

        $.ajax({
            url: `/send-response-message`,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.status == 200) {
                    Display_Pending_Inquiry();
                    showtoastMessage(
                        "text-success",
                        "Added Successful",
                        res.message
                    );
                    $("#view-inquiry-modal").modal("hide");
                    $("#send_response").reset();
                }
            },
            error: function (res) {
                var errors = res.responseJSON.errors;
                // console.log(errors)

                var inputs = $(
                    "#send_response input, #send_response select, #send_response textarea"
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
}
function Display_Pending_Inquiry() {
    $("#table-pending-inquiry-display tbody").empty;
    var datatable = $(".table-inquiry-container");
    datatable.empty();
    var table =
        "<table id='table-pending-inquiry-display' class='table table-stripped border border-bordored w-100'>";
    table += " <thead>";
    table += " <tr>";
    table += `  <th class='text-start'><i class="fa-solid fa-star"></i></th>`;
    table += "  <th class='text-start'>Name</th>";
    table += " <th class='text-center'>Contact</th>";
    table += " <th>Email</th>";
    table += " <th class='text-center'>Details</th>";
    table += " </tr>";
    table += "   </thead >";
    table += "   <tbody class='text-nowrap'>";
    table += "</tbody > ";
    table += " </table >";
    datatable.append(table);

    let activated = new DataTable("#table-pending-inquiry-display", {
        ajax: {
            url: "/pending-inquiry",
            type: "GET",
            dataSrc: "inquiry",
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
                    return `<p class="">${row.identicality}. ${row.f_name} ${row.l_name}</p>`;
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    return `<p class="text-center">${row.phone_num}</p>`;
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    return `<p class="">${row.email}</p>`;
                },
            },

            {
                data: null,
                render: function (data, type, row) {
                    var status = `<div class="text-center"><p data-id="${row.id}" style='cursor:pointer' class='view-inquiry-btn bg-primary rounded-1 py-1'>View</p></div>`;
                    return status;
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
