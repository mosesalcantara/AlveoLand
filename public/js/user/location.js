$(document).ready(function () {
    var active_location = JSON.parse(localStorage.getItem("active-location"));
    if (active_location !== null) {
        Active_Location();
    }
    LocationEvents();
});

function LocationEvents() {
    $(document).on("click", ".visit-unit-btn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        localStorage.removeItem("project_unit_id");
        localStorage.setItem("project_unit_id", id);
        window.location.href = "/view-units";
    });
}

function Active_Location() {
    var active_location = JSON.parse(localStorage.getItem("active-location"));
    $.ajax({
        type: "GET",
        url: `/our-properties/city/${active_location}`,
        success: function (res) {
            console.log(res);
            $("#location-active-data").text(active_location);
            $.each(res.project, function (proIndex, proData) {
                // console.log(proData);
                var project = ` <div class="col-12">
                    <div class="py-3 ">
                        <div class="row">
                            <div class="col-2 text-end">
                                <img src="/project/snapshots/${
                                    proData.project_logo
                                }" height="100" class="text-end" alt="">

                            </div>
                            <div class="col-6 text-start">
                                <h2 class=" text-start"><span class="me-3 text-primary"><i
                                            class="fa-solid fa-building"></i></span> <span class="text-success">${
                                                proData.project_name
                                            }</span></h2>
                                <h3>Properties</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="project-${proData.project_name.replace(
                        " ",
                        ""
                    )}">
                  
                    </div>
                </div>`;
                $(`#property-container-location`).append(project);

                $.each(res.units, function (indexdata, indexVal) {
                    var unit_category =
                        indexVal.project_unit_category_type == "Lease"
                            ? money.format(indexVal.project_unit_price) +
                              " per month"
                            : money.format(indexVal.project_unit_price);
                    if (proData.project_name == indexVal.project_name) {
                        var details = ` <div class="col-4 p-3 text-center">
                            <div class=" bg-white shadow-sm"
                                style='cursor:pointer;background: linear-gradient(to top, rgba(7, 148, 236, 0.7), rgba(255, 255, 255, 0.001)), url("/project/units/snapshots/${indexVal.project_unit_banner}");
                height:50vh; background-size:cover; background-position:center background-repeat:no-repeat'>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <h4 class="text-light pt-3"><span class="bg-warning py-1 px-5 rounded-2">${indexVal.project_unit_category_type}</span></h4>
                                <h6 class="bg-success text-light py-3">${indexVal.project_unit_category_description} | ${unit_category}</h6>
                                <a data-id="${indexVal.id}"  class="visit-unit-btn"><span class="text-light  fs-6" >View Unit</span></a>

                            </div>
                        </div>`;
                        $(
                            `#project-${proData.project_name.replace(" ", "")}`
                        ).append(details);
                    }
                });
            });
        },
    });
}
let money = new Intl.NumberFormat("fil-PH", {
    style: "currency",
    currency: "PHP",
});
