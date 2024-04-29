function AwardsBtn() {
    $('#add-awards-btn').click(function (e) {
        e.preventDefault();
        $('#view-awards-modal').modal('show')
    });

    $(document).on('click', '.delete-award-btn', function (e) {
        e.preventDefault();
        var id = $(this).data('id')
        $.ajax({
            type: "GET",
            url: "/admin/awards/delete-award/" + id,
            data: "data",
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    AwardsTable()
                    $('#submit-on-process').addClass('d-none')
                    $('#submit-btn').removeClass('d-none')
                } else {

                }

            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })
}

function AwardsTable() {
    var datatable = $('.table-awards-container');
    datatable.empty()
    var table = "<table id='awards-data-table' class='table table-stripped border border-bordored'>"
    table += " <thead>"
    table += " <tr>"
    table += "   <th>Awards</th>"
    table += " <th>Date</th>"
    table += "  <th>Awarder</th>"
    table += "   <th class='text-center'>Actions</th>"
    table += " </tr>"
    table += "   </thead >"
    table += "   <tbody>"
    table += "</tbody > "
    table += " </table >"
    datatable.append(table)

    let activated = new DataTable('#awards-data-table', {
        "ajax": {
            "url": "/admin/awards/data",
            "type": "GET",
            "dataSrc": "awards",
        },
        "columns": [
            {
                "data": null,
                "render": function (data, type, row) {
                    return '<p class="">' + row.awards_title + '</p>'
                }
            },

            {
                "data": null,
                "render": function (data, type, row) {
                    return '<p class="">' + row.date + '</p>'
                }
            },
            {
                "data": null,
                "render": function (data, type, row) {
                    return '<p class="">' + row.awarder + '</p>'
                }
            },
            {
                "data": null,
                "render": function (data, type, row) {
                    var action = "<td class='text-center'><button type='button' data-id=" + row.id + " class='btn btn-primary m-1 view-property-btn'>Edit</button><button type='button' data-id=" + row.id + " class='btn btn-primary m-1 delete-award-btn'>Delete</button></td> "
                    return action

                }
            },

        ],
    });
}
function CreateAwards() {
    $('#create-award-form').submit(function (e) {
        e.preventDefault();
        $('#submit-on-process').removeClass('d-none')
        $('#submit-btn').addClass('d-none')
        $('.errorMessage').text('')
        var formdata = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "/admin/awards/create",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    AwardsTable()
                    $('#create-award-form')[0].reset()
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