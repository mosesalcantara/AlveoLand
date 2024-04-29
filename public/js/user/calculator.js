function Calculator() {
    $(".loan-calculate-clear").click(function (e) {
        e.preventDefault();
        $("#calculator-form")[0].reset();
    });
    $(".loan-calculate").click(function () {
        var selling_price = $(".loan-selling-price").val();
        var downpayment = $(".loan-downpayment").val() / 100;
        var term = $(".loan-term").val();
        var interest_rate = $(".loan-interest-rate").val() / 100;
        if (
            selling_price == "" ||
            downpayment == "" ||
            term == "" ||
            interest_rate == ""
        ) {
            window.alert("Please complete the form first");
            $("#loan-results").empty();
            $("#loan-results").addClass("d-none");
            console.log("complete the form");
        } else {
            $("#loan-results").empty();
            $("#loan-results").removeClass("d-none");
            let money = new Intl.NumberFormat("fil-PH", {
                style: "currency",
                currency: "PHP",
            });

            var down = selling_price * downpayment;
            var finance = selling_price - down;

            var amortization =
                (finance * (interest_rate / 12)) /
                (1 - (1 + interest_rate / 12) ** (-12 * term));
            var price = isNaN(selling_price)
                ? "---"
                : money.format(selling_price);
            var amount_finance = isNaN(finance) ? "---" : money.format(finance);
            var loan_downpayment = isNaN(down) ? "---" : money.format(down);

            var monthly_amortization = isNaN(amortization)
                ? "---"
                : money.format(amortization);

            var result = `         <div class="col-6">\
                        Selling Price:\
                    </div>\
                    <div class="col-6 text-end">${price}</div>\
                    <div class="col-6">
                        <strong> Downpayment:</strong>\
                    </div>\
                    <div class="col-6 text-end"><strong>${loan_downpayment}</strong></div>\
                    <div class="col-6">\
                        Amount Financed:\
                    </div>\
                    <div class="col-6 text-end">${amount_finance}</div>\
                    <div class="col-6">\
                        <strong>\
                            Monthly Amortization:\
                        </strong>\
                    </div>\
                    <div class="col-6 text-end"><strong>${monthly_amortization}</strong></div>`;

            $("#loan-results").empty();
            $("#loan-results").append(result);
        }
    });
}
function Calculator_Events() {
    $("#").click(function (e) {
        e.preventDefault();
        $("#calculator-form")[0].reset();
    });
}
