
function Search_Properties() {
    $('#search_properties_available').submit(function (e) {
        e.preventDefault();
        var formdata = new FormData($(this)[0])
        $.ajax({
            type: "POST",
            url: "/search/property/data",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                $('#listings-of-ourproperties').empty();
                console.log(response)
                if (response.status == 200) {
                    $('#property-results-message').empty()
                    var message = "<span class='text-secondary fs-4 fw-semibold'>" + response.count + " " + response.message + "</span>"
                    $('#property-results-message').append(message)
                    $.each(response.searched, function (index, data) {
                        var property = "<div class='col-lg-3 col-sm-12'><div  class='card'><div id='property_background_" + data.id + "' class='property_btn_action card-body rounded-2 position-relative ' data-value=" + data.id + " style='cursor:pointer'><div class='position-absolute bg-success py-1 px-3 rounded-2 top-0 start-50 ms-5 mt-3'><span class='text-white'>" + data.property_availability + "</span></div><div class='p-3 lh-2'><p class='text-light'>" + data.city + "</p><span class='text-light fs-3  '>" + data.property_name + "</span><br><span class='text-light'>" + data.property_type + "</span></div></div></div></div>"
                        $('#listings-of-ourproperties').append(property);
                        $.each(response.images, function (index, val) {
                            if (data.galleria_id == val.gallery_id) {
                                $('#property_background_' + data.id + '').css({
                                    'background': 'linear-gradient(to bottom, rgb(22, 94, 177), rgba(255, 255, 255, 0)), url("/images/' + val.image_name + '")',
                                    'background-size': 'cover',
                                    'background-position': 'center',
                                    'background-repeat': 'no-repeat',
                                    'height': '300px'
                                });
                            }
                        });
                    });
                } else if (response.status == 400) {
                    $('#property-results-message').empty()
                    var message = "<span class='text-secondary fs-4 fw-semibold'>" + response.count + " " + response.message + "</span>"
                    $('#property-results-message').append(message)

                }
                else if (response.status == 404) {
                    Properties_datas()
                }

            }, error: function (xhr, status, error) {
                console.error(xhr.responseTxt)
            }
        });

    });

}


function Properties_datas() {
    $('#listings-of-ourproperties').empty();
    var searched = localStorage.removeItem('searched')
    var counter = localStorage.removeItem('count')
    var images = localStorage.removeItem('images')
    var message = localStorage.removeItem('message')
    $.ajax({
        type: "GET",
        url: "/our-properties/list/data",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            if (response.status == 200) {
                $('#property-results-message').empty()
                var message = "<span class='text-secondary fs-4 fw-semibold'>" + response.count + " " + response.message + "</span>"
                $('#property-results-message').append(message)
                $.each(response.our_properties, function (index, data) {
                    var property = "<div class='col-lg-3 col-sm-12'><div  class='card'><div id='property_background_" + data.id + "' class='property_btn_action card-body rounded-2 position-relative ' data-value=" + data.id + " style='cursor:pointer'><div class='position-absolute bg-success py-1 px-3 rounded-2 top-0 start-50 ms-5 mt-3'><span class='text-white'>" + data.property_availability + "</span></div><div class='p-3 lh-2'><p class='text-light'>" + data.city + "</p><span class='text-light fs-3  '>" + data.property_name + "</span><br><span class='text-light'>" + data.property_type + "</span></div></div></div></div>"
                    $('#listings-of-ourproperties').append(property);

                    $.each(response.images, function (index, val) {
                        if (data.galleria_id == val.gallery_id) {
                            $('#property_background_' + data.id + '').css({
                                'background': 'linear-gradient(to bottom, rgb(22, 94, 177), rgba(255, 255, 255, 0)), url("/images/' + val.image_name + '")',
                                'background-size': 'cover',
                                'background-position': 'center',
                                'background-repeat': 'no-repeat',
                                'height': '300px'
                            });
                        }
                    });
                });
            } else if (response.status == 400) {
                $('#property-results-message').empty()
                var message = "<span class='text-secondary fs-4 fw-semibold'>" + response.count + " " + response.message + "</span>"
                $('#property-results-message').append(message)

            }
        }, error: function (xhr, status, error) {
            console.error(xhr.responseTxt)
        }
    });


}

function Property_link() {
    $(document).on('click', '.property_btn_action', function () {
        var value = $(this).data('value');
        localStorage.setItem('active_property_view_id', value)
        var baseUrl = "http://127.0.0.1:8000/"
        location.href = baseUrl + "our-property/view"

    })
}


function Checker() {
    var counter = localStorage.getItem('count')
    if (counter > 0) {
        $('#listings-of-ourproperties').empty();
        var searched = JSON.parse(localStorage.getItem('searched'));
        var images = JSON.parse(localStorage.getItem('images'));
        var message = localStorage.getItem('message');

        $('#property-results-message').empty()
        var message = "<span class='text-secondary fs-4 fw-semibold'>" + counter + " " + message + "</span>"
        $('#property-results-message').append(message)
        $.each(searched, function (index, data) {
            var property = "<div class='col-lg-3 col-sm-12'><div  class='card'><div id='property_background_" + data.id + "' class='property_btn_action card-body rounded-2 position-relative ' data-value=" + data.id + " style='cursor:pointer'><div class='position-absolute bg-success py-1 px-3 rounded-2 top-0 start-50 ms-5 mt-3'><span class='text-white'>" + data.property_availability + "</span></div><div class='p-3 lh-2'><p class='text-light'>" + data.city + "</p><span class='text-light fs-3  '>" + data.property_name + "</span><br><span class='text-light'>" + data.property_type + "</span></div></div></div></div>"
            $('#listings-of-ourproperties').append(property);

            $.each(images, function (index, val) {
                if (data.galleria_id == val.gallery_id) {
                    $('#property_background_' + data.id + '').css({
                        'background': 'linear-gradient(to bottom, rgb(22, 94, 177), rgba(255, 255, 255, 0)), url("/images/' + val.image_name + '")',
                        'background-size': 'cover',
                        'background-position': 'center',
                        'background-repeat': 'no-repeat',
                        'height': '300px'
                    });
                }
            });
        });

    } else {
        Properties_datas()
    }
}




function SearchProperty() {

    $('#index_search_properties_available').submit(function (e) {
        e.preventDefault();
        var searched = localStorage.removeItem('searched')
        var counter = localStorage.removeItem('count')
        var images = localStorage.removeItem('images')
        var message = localStorage.removeItem('message')
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
                    localStorage.setItem('searched', JSON.stringify(response.searched))
                    localStorage.setItem('status', response.status)
                    localStorage.setItem('images', JSON.stringify(response.images))
                    localStorage.setItem('count', response.count)
                    localStorage.setItem('message', response.message)
                    window.location.href = "/our-properties"
                } else {

                }

            }, error: function (xhr, status, error) {
                console.error(xhr.responseTxt)
            }
        });

    });

}