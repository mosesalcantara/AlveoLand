function ProspectLoader() {
    var location = localStorage.getItem('location-address')

    console.log(location)
    $.ajax({
        type: "GET",
        url: "/selling-properties/data/" + location,
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            if (response.status == 200) {
                $('#prospect_descriptions').text(response.prospect.creative_description)
                $('#city_name').text(response.prospect.city_name)
                $('#prospect-banner-img').css({
                    'background': 'linear-gradient(to left, rgba(255, 255, 255, 0.2), rgba(3, 67, 193, 0.9)), url("/images/' + response.prospect.prospect_banner + '")',
                    'background-size': 'cover',
                    'background-position': 'center',
                    'background-repeat': 'no-repeat',
                    'height': '50vh',
                    'max-height': '100%'
                });
                $.each(response.properties, function (index, data) {
                    $.each(response.featured, function (ind, val) {
                        if (data.id == val.property_id) {
                            var list = "<div class='col-lg-8 col-sm-12 mb-5'><button type='button' id='property-view-btn' data-id='" + data.id + "' class='text-decoration-none btn text-primary'>" + data.property_name + "</button><p><i>" + val.sub_description + "</i> </p><p>Location: <span>" + data.barangay + ", " + data.city + ", " + data.province + "</span></p><li>No. of lots: 603 lots</li><li>Lot sizes: approx. 252–536 sq.m.</li></div><div class='col-lg-4 col-sm-12 mb-5'><img class='rounded-2' src='/images/" + val.featured_banner + "' height='200px' alt='" + val.featured_banner + "'></div>"
                            $('#listings-of-available-properties').append(list)
                        }
                    });

                });

            } else {

                $('#prospect_descriptions').text(response.prospect.creative_description)
                $('#city_name').text(response.prospect.city_name)
                $('#prospect-banner-img').css({
                    'background': 'linear-gradient(to left, rgba(255, 255, 255, 0.2), rgba(3, 67, 193, 0.9)), url("/images/' + response.prospect.prospect_banner + '")',
                    'background-size': 'cover',
                    'background-position': 'center',
                    'background-repeat': 'no-repeat',
                    'height': '50vh',
                    'max-height': '100%'
                });
                $('#prospect_results').text(response.message)
            }
        }, error: function (xhr, status, error) {
            console.error(xhr.responseTxt)
        }
    });
}