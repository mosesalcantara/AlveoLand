function Submit_Property() {
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
                $("#submit-btn").prop("disabled", false);
                console.log(res);
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
