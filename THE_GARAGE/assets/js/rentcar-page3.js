$("#cashpayment").click(function() {
    $("#cashpayment").css("opacity", "1");
    $("#creditpayment").css("opacity", "0.4");
})


$("#creditpayment").click(function() {
    $("#creditpayment").css("opacity", "1");
    $("#cashpayment").css("opacity", "0.4");
})

$("#checkoutbtn").click(function() {

    var selection = ($("input:radio[name='cardType']:checked").val())
    var allinfobuurl = document.querySelectorAll(".mg");
    var allinfobyurl = Array.from(allinfobuurl).map(item => item.innerText)

    if (selection == "creditCard") {
        console.log("clicked")
        var name = document.getElementById("nameOnCard").value;
        var number = document.getElementById("cardNumber").value;
        var date = document.getElementById("expirationDate").value;
        var cvc = document.getElementById("cvc").value;

        //console.log(allinfobyurl)

        if (name == "" || number == "" || date == "" || cvc == "")
            $("#sms").css("display", "block")
        else {
            $("#sms").css("display", "none")
            var allinfo = " Card Name = " + name + " Card Number =" + number + " CVC = " + cvc + " Expirey date = " + date;

            $.post("includes/handlers/makeorderbycredit-handler.php", { info_array: allinfobyurl, credit_info: allinfo }).done(function(response) {
                //console.log(response)
                if (response == "") {
                    var finished = "true";
                    var url = "rentcar-page4.php?finished=" + finished;
                    //console.log(url);
                    window.location.href = url;
                }
            })
        }

    } else {
        $.post("includes/handlers/makeorderbycash-handler.php", { info_array: allinfobyurl, cash: "Cash" }).done(function(response) {
            console.log(response)
            if (response == "") {
                var finished = "true";
                var url = "rentcar-page4.php?finished=" + finished;
                //console.log(url);
                window.location.href = url;
            }
        })
    }

})