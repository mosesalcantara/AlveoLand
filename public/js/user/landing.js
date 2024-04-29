
function Search_Properties() {
    $('#search_properties_available').submit(function (e) {
        e.preventDefault();
        window.location.href = "/our-properties"

        var formdata = new FormData($(this)[0])
        $.ajax({
            type: "POST",
            url: "/search/property/data",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    console.log(response.status)
                    localStorage.setItem('main', response.searched)
                    localStorage.setItem('images', response.images)
                    localStorage.setItem('count', response.count)
                    console.log(localStorage.getItem('main'))
                } else {
                    window.location.href = "/our-properties"

                }

            }, error: function (xhr, status, error) {
                console.error(xhr.responseTxt)
            }
        });

    });

}
