function LocationsList() {
    var spinner =
        "<div class='location-spinner text-center'><span class=''><div class='spinner-border text - primary' role='status'></div ></span></div>";
    $(".locations-city-list").append(spinner);
    $.ajax({
        type: "GET",
        url: "/our-properties/locations/list",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response.status == 200) {
                $(".location-spinner").addClass("d-none");
                $.each(response.locations, function (index, data) {
                    var list =
                        "<li><button type='button' data-value='" +
                        index +
                        "' class='dropdown-item locations-properties-btn'> <span class='me-3'><i class='fa-solid fa-location-dot'></i></span>" +
                        index +
                        "</button></li>";
                    $(".locations-city-list").append(list);
                });
            } else {
                $(".location-spinner").addClass("d-none");
            }
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error(xhr.reponseTxt);
        },
    });
}

function LocationReloader() {
    $(document).on("click", ".locations-properties-btn", function () {
        var value = $(this).data("value");
        localStorage.setItem("location-address", value);
        location.href = "/selling-properties";
    });
}
