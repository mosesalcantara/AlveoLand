function Dashboard() {
    $.ajax({
        type: "GET",
        url: "/project-count",
        success: function (res) {
            var count =
                res.length > 0
                    ? $("#project-count").text(res.length)
                    : $("#project-count").text("0");
        },
    });
    $.ajax({
        type: "GET",
        url: "/unit-count",
        success: function (res) {
            var count =
                res.length > 0
                    ? $("#unit-count").text(res.length)
                    : $("#unit-count").text("0");
        },
    });
    $.ajax({
        type: "GET",
        url: "/request-count",
        success: function (res) {
            var count =
                res.length > 0
                    ? $("#request-count").text(res.length)
                    : $("#request-count").text("0");
        },
    });
    $.ajax({
        type: "GET",
        url: "/inquiry-count",
        success: function (res) {
            var count =
                res.length > 0
                    ? $("#inquiry-count").text(res.length)
                    : $("#inquiry-count").text("0");
        },
    });
}
