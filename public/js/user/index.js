var element = $(".floating-chat");
var myStorage = localStorage;

if (!myStorage.getItem("chatID")) {
    myStorage.setItem("chatID", createUUID());
}
function DisplaySaleUnitEvent() {
    $(document).on("click", ".display-units", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        localStorage.removeItem("project_id");
        localStorage.setItem("project_id", id);
        window.location.href = "/project-units";
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
function hidetoastMessage() {
    $("#toastMessage").text("");
    $("#toastContent").text("");
    const toastBootstrap = new bootstrap.Toast("#toasMessage");
    toastBootstrap.show();
}

setTimeout(function () {
    element.addClass("enter");
}, 1000);

element.click(openElement);

function openElement() {
    var messages = element.find(".messages");
    var textInput = element.find(".text-box");
    element.find(">i").hide();
    element.addClass("expand");
    element.find(".chat").addClass("enter");
    var strLength = textInput.val().length * 2;
    textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
    element.off("click", openElement);
    element.find(".header button").click(closeElement);
    element.find("#sendMessage").click(sendNewMessage);
    messages.scrollTop(messages.prop("scrollHeight"));
}

function closeElement() {
    element.find(".chat").removeClass("enter").hide();
    element.find(">i").show();
    element.removeClass("expand");
    element.find(".header button").off("click", closeElement);
    element.find("#sendMessage").off("click", sendNewMessage);
    element
        .find(".text-box")
        .off("keydown", onMetaAndEnter)
        .prop("disabled", true)
        .blur();
    setTimeout(function () {
        element.find(".chat").removeClass("enter").show();
        element.click(openElement);
    }, 500);
}

function createUUID() {
    // http://www.ietf.org/rfc/rfc4122.txt
    var s = [];
    var hexDigits = "0123456789abcdef";
    for (var i = 0; i < 36; i++) {
        s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
    }
    s[14] = "4"; // bits 12-15 of the time_hi_and_version field to 0010
    s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1); // bits 6-7 of the clock_seq_hi_and_reserved to 01
    s[8] = s[13] = s[18] = s[23] = "-";

    var uuid = s.join("");
    return uuid;
}

function sendNewMessage() {
    var botreply = "";
    var userInput = $(".text-box");
    var newMessage = userInput
        .html()
        .replace(/\<div\>|\<br.*?\>/gi, "\n")
        .replace(/\<\/div\>/g, "")
        .trim()
        .replace(/\n/g, "<br>");

    if (!newMessage) return;

    // Check if the user input matches any of the greetings
    if (
        newMessage === "Properties" ||
        newMessage === "property" ||
        newMessage === "properties" ||
        newMessage === "Property"
    ) {
        botreply =
            "Here's our properties we offer! </br>Condominium, Offices, Lots, Commercial </br Would you like to navigate this offerings?>";
        // botreply = "How are you?";
    } else if (
        newMessage === "Yes" ||
        newMessage === "yes" ||
        newMessage === "YES"
    ) {
        botreply = " is this for lease or for sale?";
    } else if (
        newMessage === "No" ||
        newMessage === "no" ||
        newMessage === "NO"
    ) {
        botreply =
            "Ok, How can I assist you today? Feel free to explore our services by choosing from these options: Properties, For Sale, For Lease, About Us, or Other Services. Just type the category you're interested in, and I'll be happy to help. Thank you!";
    } else if (
        newMessage === "for sale" ||
        newMessage === "for Sale" ||
        newMessage === "For Sale" ||
        newMessage === "forsale" ||
        newMessage === "sale" ||
        newMessage === "Sale"
    ) {
        botreply =
            "Ok, How can I assist you today? Feel free to explore our services by choosing from these options: Properties, For Sale, For Lease, About Us, or Other Services. Just type the category you're interested in, and I'll be happy to help. Thank you!";
    }

    var messagesContainer = $(".messages");

    // Append the user's message
    messagesContainer.append('<li class="self">' + newMessage + "</li>");
    // Append the bot's reply
    messagesContainer.append('<li class="other">' + botreply + "</li>");

    // Clean out old message
    userInput.html("");
    // Focus on input
    userInput.focus();

    messagesContainer.finish().animate(
        {
            scrollTop: messagesContainer.prop("scrollHeight"),
        },
        250
    );
}

function onMetaAndEnter(event) {
    if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
        sendNewMessage();
    }
}

function PropertyViewBtn() {
    // $('.property-view-btn').click(function (e) {

    // })
    $(document).on("click", ".property-view-btn", function (e) {
        var id = $(this).data("id");
        console.log(id);
        localStorage.setItem("active_property_view_id", id);
        var data = localStorage.getItem("active_property_view_id");
        console.log(data);
        var baseUrl = "http://127.0.0.1:8000/";
        location.href = baseUrl + "our-property/view";
    });
}

function tagline() {
    $.ajax({
        type: "GET",
        url: "/user/tagline/interface",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response.active_tagline != null) {
                var tagline_text =
                    "<p class='text-lg-start text-sm-center text-xl-4 text-sm-2 '>" +
                    response.active_tagline.tagline +
                    "</p>";
                $("#home-tagline").append(tagline_text);
            } else {
                var tagline_text = "<p>Create your own tagline</p>";
                $("#home-tagline").append(tagline_text);
            }
        },
    });
}

function Plansbtn() {
    $(document).on("click", "#plans_details-btn", function (e) {
        e.preventDefault();
        $("#property-content-data").addClass("d-none");
        $("#property_gallery_images_data").addClass("d-none");
        $("#property_plans_view").removeClass("d-none");
        $("#property_plans_images").removeClass("d-none");
        console.log($(this).data("id"));
    });

    $(".menuback").click(function (e) {
        e.preventDefault();
        $("#property-content-data").removeClass("d-none");
        $("#property_gallery_images_data").removeClass("d-none");
        $("#property_plans_view").addClass("d-none");
        $("#property_plans_images").addClass("d-none");
    });
}

function featuredProperties() {
    $.ajax({
        type: "GET",
        url: "/our-property/featured",
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response.status == 200) {
                $.each(response.properties, function (prop, propdata) {
                    if (propdata.status == "Publish") {
                        $.each(response.images, function (img, imgdata) {
                            if (
                                propdata.parent_image_id == imgdata.gallery_id
                            ) {
                                var activeCar = "";
                                if (prop == 0) {
                                    activeCar = "active";
                                    $(".carousel-item").addClass(activeCar);
                                } else {
                                    activeCar = "active";
                                    $(".carousel-item").add(activeCar);
                                }
                                var carousel = `<div class="carousel-item                                   " >
                                <div class="col-md-4 col-sm-12" >
                                    <div  data-id="${propdata.id}"  class="card  property-view-btn bg-success" style="background: linear-gradient(to top, #323231, rgba(255, 255, 255, 0)), url('images/${imgdata.image_name}'); cursor: pointer; background-size: cover; background-position: center; background-repeat: no-repeat; height:300px">
                                        <span class="bg-light px-4 fs-6 rounded-end py-2 text-secondary fw-semibold property-city-overlays ">
                                            ${propdata.city}
                                        </span>
                                        <span class="fs-5 py-2 text-light fw-semibold border-bottom border-light property-name-overlays">
                                            ${propdata.property_name}
                                        </span>
                                        <span class="fs-6  py-2 text-light property-type-overlays">
                                            ${propdata.property_type}
                                        </span>

                                    </div>
                                </div>
                            </div>`;
                                $("#featureContainer .carousel-inner").append(
                                    carousel
                                );
                            }
                        });
                    }
                });
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseTxt);
        },
    });
}
function EventsLocation() {
    $(document).on("click", ".locations-properties-btn", function (e) {
        e.preventDefault();
        var data = $(this).data("value");
        localStorage.setItem("active-location", JSON.stringify(data));
        var active_location = JSON.parse(
            localStorage.getItem("active-location")
        );
        window.location.href = "/our-properties/locations";
        console.log(active_location);
    });
}

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
            // console.log(response);
            if (response.status == 200) {
                $(".location-spinner").addClass("d-none");
                $.each(response.locations, function (index, data) {
                    var list = `<li><button type='button' data-value='${index}' class='dropdown-item locations-properties-btn'> <span class='me-3'><i class='fa-solid fa-location-dot'></i></span>${index}</button></li>`;
                    $(".locations-city-list").append(list);
                });
            } else {
                $(".location-spinner").addClass("d-none");
            }

            if (response.status == 200) {
                // $(".location-spinner").addClass("d-none");
                var select = $(".location-select");
                select.append("<option selected>Choose Location</option>");
                $.each(response.locations, function (index, data) {
                    var opt = $("<option>");
                    opt.text(index);
                    opt.val(index);
                    select.append(opt);
                });
            }
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error(xhr.reponseTxt);
        },
    });
}
