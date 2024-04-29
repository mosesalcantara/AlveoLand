const data_id = localStorage.getItem('active_property_view_id')
function Property_Information() {
    $('.property-information-container').addClass('d-none')
    $.ajax({
        type: "GET",
        url: "/our-properties/data/" + data_id,
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            if (response.status == 200) {
                $('.property-information-container').removeClass('d-none')
                $('.our-property-btn').attr('data-id', response.property.id)
                $('.property-name').text(response.property.property_name)
                $('#property-tagline').text(response.property.tagline)
                $('.property-city').text(response.property.city)
                $('#property-location').text(response.property.street + ', ' + response.property.barangay + ', ' + response.property.city + ', ' + response.property.province)
                $('#property-description').text(response.property.description);
                $('#property-estimated-price').text(response.property.estimated_price);
                $('#property-estimated-reference').text(response.property.reference_date);
                var d = $('#property-estimated-reference').text();
                d = d.replace(/-/g, '/');
                $('#property-estimated-reference').html(d)
                var description = $('#property-description').text();
                description = description.replace(/\r?\n/g, '<br />');
                $('#property-description').html(description);

            } else if (response.status == 400) {
                $('.property-information-container').addClass('d-none')

            }

        }, error: function (xhr, status, error) {
            console.error(xhr.responseTxt)
        }
    });
}

function Property_Images() {
    $.ajax({
        type: "GET",
        url: "/our-properties/images/" + data_id,
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            if (response.status == 200) {
                $.each(response.property_images, function (prop, data) {
                    if (prop == 0) {
                        var carousel = "<div class='carousel-item active'>"
                        carousel += "  <img src='/images/" + data.image_name + "'class='d-block w-100' >"
                        carousel += "  </div>"
                        $('#property-images-view').append(carousel)
                    } else {
                        var carousel = "<div class='carousel-item'>"
                        carousel += "  <img src='/images/" + data.image_name + "'class='d-block w-100' >"
                        carousel += "  </div>"
                        $('#property-images-view').append(carousel)
                    }
                });
            } else if (response.status == 400) {

            }

        }, error: function (xhr, status, error) {
            console.error(xhr.responseTxt)
        }
    });
}



function PropertyLocationBTN() {
    $('#property-location-btn').click(function (e) {
        e.preventDefault();
        $('.property-information-container').addClass('d-none')
        $('.property-location-container').removeClass('d-none')
        $('#close-property-location-container').removeClass('d-none')

    });
    $('#close-property-location-container').click(function (e) {
        e.preventDefault();
        $('.property-information-container').removeClass('d-none')
        $('#close-property-location-container').addClass('d-none')
        $('.property-location-container').addClass('d-none')

    });
}
function Property_Construction_Updates() {
    $('#property-construction-updates-btn').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "/our-properties/construnction-updates/" + data_id,
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    $.each(response.construction, function (prop, data) {
                        if (prop == 0) {
                            var carousel = "<div class='carousel-item active'>"
                            carousel += "  <img src='/images/" + data.construction_updates + "'class='d-block w-100' >"
                            carousel += "  </div>"
                            $('#construction-updates').append(carousel)
                        } else {
                            var carousel = "<div class='carousel-item'>"
                            carousel += "  <img src='/images/" + data.construction_updates + "'class='d-block w-100' >"
                            carousel += "  </div>"
                            $('#construction-updates').append(carousel)
                        }
                    });
                } else if (response.status == 400) {
                    $('.contruction-updates-results').removeClass('d-none')
                    $('.contruction-updates-results').text(response.message)
                }
            }, error: function (xhr, status, error) {
                console.error(xhr.responseTxt)
            }
        });
        $('#construction-updates-modal').modal('show')

    });
}


function FeatureAmenitiesBtn() {
    $('#property-feature-amenities-btn').click(function (e) {
        e.preventDefault();
        $('.property-features_amenities-container').removeClass('d-none')
        $('.property-information-container').addClass('d-none')
        $('#close-property-feature-amenities-container').removeClass('d-none')

    });
    $('#close-property-feature-amenities-container').click(function (e) {
        e.preventDefault();
        $('.property-features_amenities-container').addClass('d-none')
        $('.property-information-container').removeClass('d-none')
        $('#close-property-feature-amenities-container').addClass('d-none')

    });

    $(document).on('click', '.parentFeatureAmenitiesbtn', function (e) {
        e.preventDefault()
        var id = $(this).data('id');
        console.log(id)
        var accordionitem = $('#accordion-item-' + id + '')
        if (accordionitem.hasClass('d-none')) {
            $('#accordion-item-' + id + '').removeClass('d-none')

        } else {
            $('#accordion-item-' + id + '').addClass('d-none')

        }
    })


}
function FeaturesAmenitiesList() {
    $.ajax({
        type: "GET",
        url: "/our-properties/features_amenities/" + data_id,
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            if (response.status == 200) {
                $.each(response.features_amenities_parent, function (indexParent, parentData) {
                    var parent = "<div data-id='" + parentData.id + "' class='parentFeatureAmenitiesbtn w-100 mt-2 border border-1  py-3 px-5  rounded-0' style='cursor: pointer'><span class='fw-semibold text-dark'>" + parentData.name + "</span></div><div id='accordion-item-" + parentData.id + "' class='border border-1 d-none px-5 py-3 border-top border-1'><ul id='accordion-list-description-" + parentData.id + "'></ul></div>"
                    $('#features-amenities-item-container').append(parent)
                    $.each(response.child_features, function (childFeatureIndex, childFeatureData) {
                        if (parentData.id == childFeatureData.feature_amenities_id) {
                            var items = "<li>" + childFeatureData.description + "</li>"
                            $('#accordion-list-description-' + parentData.id + '').append(items);
                        }
                    });
                    $.each(response.child_amenities, function (childAmenitiesIndex, childAmenitiesData) {
                        if (parentData.id == childAmenitiesData.feature_amenities_id) {
                            var items = "<li>" + childAmenitiesData.description + "</li>"
                            $('#accordion-list-description-' + parentData.id + '').append(items);
                        }
                    });

                });

            } else {
                var message = "<p class='text-center'>" + response.message + "</p>"
                $('#features-amenities-item-container').append(message)
            }


        }, error: function (xhr, status, error) {
            console.error(xhr.responseTxt)
        }
    });
}


function prevBtn() {
    $('#previewPlansBtn').click(function (e) {
        e.preventDefault();
        var active = parseInt(localStorage.getItem('plansCounter'));
        var arrayC = parseInt(localStorage.getItem('arrayCount'));
        if (active >= 0) {
            localStorage.setItem('plansCounter', arrayC)
            PlansDataPreview(active);
        } else {
            active--
            PlansDataPreview(active);
        }
    });
}

function nextBtn() {
    $('#nextPlansBtn').click(function (e) {
        e.preventDefault();
        var active = parseInt(localStorage.getItem('plansCounter'));
        var arrayC = parseInt(localStorage.getItem('arrayCount'));
        if (active <= arrayC) {
            localStorage.setItem('plansCounter', 0)
            PlansDataPreview(active);
        } else {
            active++
            PlansDataPreview(active);
        }
    });
}



function PlansBtn() {
    $('#property-plans-btn').click(function (e) {
        e.preventDefault();
        localStorage.setItem('plansCounter', 0)
        var active = localStorage.getItem('plansCounter', 0)
        $('#property-plans-container').removeClass('d-none')
        $('.property-information-container').addClass('d-none')
        $('.property-plans-container').removeClass('d-none')
        $('#close-property-plans-container').removeClass('d-none')
        $('#propertyImages').addClass('d-none')
        $('#plansImages').removeClass('d-none')
        PlansDataPreview(active)

    });
    $('#close-property-plans-container').click(function (e) {
        e.preventDefault();
        localStorage.removeItem('plansCounter')
        $('#property-plans-container').addClass('d-none')
        $('.property-information-container').removeClass('d-none')
        $('.property-plans-container').addClass('d-none')
        $('#close-property-plans-container').addClass('d-none')
        $('#propertyImages').removeClass('d-none')
        $('#plansImages').addClass('d-none')


    });



}


function PlansPreviewLoader(plans_id) {
    $.ajax({
        type: "GET",
        url: "/our-properties/plans/view/" + plans_id,
        data: "data",
        dataType: "json",
        success: function (response) {
            var loaderData = response.plans_parent
            if (response.status == 200) {
                $('#plans_details_preview').empty();
                $('#floorPlanView').attr('src', '')
                var sqm = 0
                var sqft = 0
                $('#floorPlanView').attr('src', '/images/' + loaderData.floor_image)
                var details = "<div  class='plansParent card rounded-0'><div class='card-body rounded-0 '><div  class='row rounded-0'><div class='col-7 bg-secondary rounded-1 me-2 text-light text-center p-2'><div id='plans_name'> <span class='fw-semibold'>" + loaderData.plans_name + "</span></div></div><div class='col-2 bg-secondary rounded-1 me-2 text-light text-center p-2'><span class='fw-semibold'>SQ.M.</span></div><div class='col-2 bg-secondary rounded-1 text-light text-center p-2'><span class='fw-semibold'>SQ.FT.</span></div></div><div id='plans_details_data_" + loaderData.id + "' class='row p-3'></div> <div  id='plans_details_data_total" + loaderData.id + "'  class='row '></div></div></div>";
                $('#plans_details_preview').append(details);
                $.each(response.plans_details_child, function (index, data) {
                    if (loaderData.id == data.id) {
                        sqm = sqm + parseFloat(data.sqm)
                        sqft = sqft + parseFloat(data.sqft)
                        var col = "<div class='col-7 text-secondary'>" + data.description + "</div>"
                        col += "<div class='col-2 text-secondary text-center'>" + data.sqm + "</div>"
                        col += "<div class='col-2 text-secondary text-center'>" + data.sqft + "</div>"
                        $('#plans_details_data_' + loaderData.id + '').append(col);
                    }

                });
                var col = "<div class='row'><div class='col-7 ps-4 py-2 text-left  fw-semibold'>Total</div>"
                col += "<div class='col-2 fw-semibold text-center p-2'>" + sqm + "</div>"
                col += "<div class='col-2 fw-semibold text-center p-2'>" + sqft + "</div></div>"
                $(col).insertAfter($('plans_details_data_' + loaderData.id + +''));
                $('#plans_details_data_total' + loaderData.id + '').append(col);
            }
        }, error: function (xhr, status, error) {
            console.error(xhr.responseTxt)
        }
    });
}



function PlansDataPreview(active) {
    console.log(active)
    $.ajax({
        type: "GET",
        url: "/our-properties/plans/" + data_id,
        data: "data",
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $('#plans-item-container').removeClass('d-none')
                $('#plans-message-results').addClass('d-none')
                var counter = parseInt(response.counter - 1)
                localStorage.setItem('arrayCount', counter)
                console.log(counter)
                $.each(response.plans_parent, function (index, parentData) {
                    if (index == active) {
                        var plans_id = parentData.id
                        PlansPreviewLoader(plans_id)

                    }


                })
            } else if (response.status == 400) {
                $('#plans-item-container').addClass('d-none')
                var message = "<span class='fs-4 text-center'>" + response.message + "</span>"
                $('#plans-message-results').append(message)

            }

        }, error: function (xhr, status, error) {
            console.error(xhr.responseTxt)
        }
    });

}








function Recommendation() {
    $('#recommendation-open-btn').click(function (e) {
        e.preventDefault();
        $('#recommended-properties-btn').removeClass('d-none')
        $('#recommendation-container').removeClass('h-25')
        $('#recommendation-container').addClass('h-100 px-5')
        $('#recommendation-open-btn').addClass('d-none')
        $('#recommendation-close-btn').removeClass('d-none')
        $('#recommended-properties-btn').addClass('border border-1 shadow-sm h-100 p-2 rounded-top overflow-auto')


    });
    $('#recommendation-close-btn').click(function (e) {
        e.preventDefault();
        $('#recommendation-open-btn').removeClass('d-none')
        $('#recommendation-close-btn').addClass('d-none')
        $('#recommended-properties-btn').addClass('d-none')
        $('#recommendation-container').removeClass('h-100')
        $('#recommendation-container').addClass('h-25')

    });

    $(document).on('click', '.recommended-property-view-btn', function (e) {
        var id = $(this).data('id')
        localStorage.setItem('active_property_view_id', id)
        var data = localStorage.getItem('active_property_view_id')
        console.log(data)
        var baseUrl = "http://127.0.0.1:8000/"
        location.href = baseUrl + "our-property/view"

    })

}

function RecommendationList() {
    $.ajax({
        type: "GET",
        url: "/our-properties/recommendation-list/" + data_id,
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response)
            if (response.status == 200) {

                $('#recommendation-container').removeClass('d-none')
                $.each(response.listings, function (index, data) {
                    var listbtn = "<button type='button' class='recommended-property-view-btn btn btn-light w-100 p-0' data-id='" + data.id + "'><div class='row p-0'><div class='col-12 p-0'><div class='row'><div class='col-4'><img id='listings-" + data.id + "'  height='100' alt='Sample'></div><div class='col w-100 p-2 text-start'><span class='text-primary fs-5'>" + data.property_name + "</span><p class='text-secondary'>" + data.city + "</p></div></div></div></div></button>";
                    $('#recommended-properties-btn').append(listbtn);
                    $.each(response.images, function (i, x) {
                        if (data.id == x.owner_id) {
                            $('#listings-' + data.id + '').attr('src', '/images/' + x.image_name)
                        }
                    });
                });

            } else {
                $('#spacerdiv').removeClass('d-none')

            }
        }, error: function (xhr, status, error) {
            console.error(xhr.responseTxt)
        }
    });
}