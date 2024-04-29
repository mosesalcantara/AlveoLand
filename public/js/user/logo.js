function viewlogo() {
    $.ajax({
        type: "GET",
        url: "/chage/logo",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            if (response.status == 200) {
                $('.logo-view-image').attr('src', '/images/' + response.published_logo.image_name)
            } else {

            }
        }
    });
}

function Loader() {
    $('#loader').fadeOut(2000);
    $('#navbar').removeClass('d-none')
    $('#section').removeClass('d-none')
    $('#navbar').fadeIn(100)
    $('#section').fadeIn(100)
}