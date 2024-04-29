function DisplaySaleUnitEvent() {
    $(document).on("click", ".display-units", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        localStorage.removeItem("project_id");
        localStorage.setItem("project_id", id);
        window.location.href = "/project-units";
    });
}
function Display_Project() {
    $("#display-project-properties").empty();
    $.ajax({
        type: "GET",
        url: "/all-project-properties",
        data: "data",
        dataType: "json",
        success: function (res) {
            console.log(res);
            if (res.status == 200) {
                $.each(res.projects, function (proIndex, proData) {
                    var card = `    <div class=" col-3 p-3">
                <div class=" rounded-2"
                    style='cursor:pointer;background: linear-gradient(to top, rgba(7, 148, 236, 0.7), rgba(255, 255, 255, 0.001)), url("/project/snapshots/${proData.project_banner}");
                                                                height:50vh; background-size:cover; background-repeat:no-repeat'>

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
                    <h4 style="color:rgb(25, 69, 107)">
                        <span class="bg-light rounded-end fw-semibold p-2"> <span class="me-2"><i
                                    class="fa-solid fa-building"></i></span>
                            ${proData.project_name}</span>
                    </h4>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="clearfix pe-3">
                        <a data-id="${proData.id}" class="display-units text-light  text-center" href="#">
                            <h6>View Units</h6>
                        </a>
                    </div>
                </div>

            </div>`;
                    $("#display-project-properties").append(card);
                });
            }
        },
    });
}
