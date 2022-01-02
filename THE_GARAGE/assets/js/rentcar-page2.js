var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();


today = yyyy + '-' + mm + '-' + dd;



var lastday = new Date();
lastday.setDate(lastday.getDate() + 30);
var dd2 = String(lastday.getDate()).padStart(2, '0');
var mm2 = String(lastday.getMonth() + 1).padStart(2, '0');
var yyyy2 = lastday.getFullYear();
var latestday = yyyy2 + '-' + mm2 + '-' + dd2;


//min deopoff date is 3 days after today 
var mindropoff = new Date();
mindropoff.setDate(lastday.getDate() + 3);
var dd3 = String(mindropoff.getDate()).padStart(2, '0');
var mm3 = String(mindropoff.getMonth() + 1).padStart(2, '0');
var yyyy3 = mindropoff.getFullYear();
var mindropoffday = yyyy3 + '-' + mm3 + '-' + dd3;


$(".pickupdate-input").attr("min", today);


$(".dropoffdate-input").attr("min", mindropoffday);
$(".dropoffdate-input").attr("max", latestday);

$(document).ready(function() {
    $(".terms-div").click(function() {
        $(".full-container").css("opacity", "0")

        $(".terms-and-conditons").slideDown(500);
    })

    $("#x").click(function() {
        $(".terms-and-conditons").fadeOut(700);
        $(".full-container").css("opacity", "1")
    })

    $(".btn-terms").click(function() {
        $(".terms-and-conditons").fadeOut(700);
        $(".full-container").css("opacity", "1")
        $(document).ready(function() {
            $("#checkbox").prop('checked', true);
        })

    })
})


$(document).ready(function() {
    $("#checkbox").click(function() {
        if ($("#checkbox").is(':checked')) {
            $("#text").css("display", "none")
            $(".btn-grad").attr("disabled", "")
            $(".btn-grad").css("opacity", "1")
        } else {
            // console.log("not checked")
            $("#text").css("display", "block")
            $(".btn-grad").attr("disabled", "disabled")
            $(".btn-grad").css("opacity", "0.2")
        }
    })

})