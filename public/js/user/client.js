function Submit_Property() {
    $.ajax({
        url: "/submit-client-property/get-projects",
        type: 'POST',
        success: function (res) {
            var records = res
            $.each(records, function(row, field) {
                var option = $('<option>').text(field.project_name).val(field.id)
                $("select[name=property_id]").append(option)
            })
            $("select[name=property_id]").val('')
        },
        error: function (res) {
            console.log(res)
        },
    })    

    $("select[name=purpose]").on( "change", function() {
        var cat_des = "select[name=category_description]"
        $(cat_des).empty()

        var sale_opts = ["Pre-selling", "RFO"]
        var lease_opts = ["Residential", "Commercial"]
        
        if ($(this).val() == 'Sale') {
            for (var opt of sale_opts) {
                var option = $('<option>').text(opt).val(opt)
                $(cat_des).append(option)
            }
        }
        else if ($(this).val() == 'Lease') {
            for (var opt of lease_opts) {
                var option = $('<option>').text(opt).val(opt)
                $(cat_des).append(option)
            }
        }
    })

    $("#client-form").submit(function (e) {
        e.preventDefault();
        $("#submit-btn").prop("disabled", true);
        var formdata = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "/submit-client-property",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (res) {
                // console.log(res)

                $("#submit-btn").prop("disabled", false);
                if (res.status == 200) {
                    $("#client-form")[0].reset();
                    // alert(res.message);
                    $("#client-form span").remove();
                    showtoastMessage(
                        "text-success",
                        "Submission Success",
                        res.message
                    );
                } else {
                    $("#client-form span").remove();
                    $.each(response.errors, function (errors, error) {
                        $(
                            '<span class="text-danger">' + error + "<span>"
                        ).insertAfter($("input[name=" + errors + "]"));
                    });
                    var message = "<p>" + response.errors + "</p>";
                }
            },
            error: function (xhr, status, error) {
                $("#submit-btn").prop("disabled", false);
                console.error(xhr.responseText);
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
