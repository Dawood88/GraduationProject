$(document).ready(function() {
    var coele = document.querySelectorAll(".co");

    coele = Array.from(coele);


    for (var i = 0; i < coele.length; i++) {
        if (coele[i].innerText == "1") {
            console.log()
            coele[i].parentElement.classList.add("done");
            coele[i].nextElementSibling.nextElementSibling.nextElementSibling.style.textDecoration = "line-through";
            coele[i].nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.children[0].style.display = "none";

            //coele[i].
        }

    }
    var namevalue = document.querySelector("#office_name").innerText;

    document.querySelector(".registernavbutton").style.display = "none";
    document.querySelector(".loginnavbutton").innerHTML = "<img src='https://img.icons8.com/external-itim2101-lineal-color-itim2101/64/000000/external-admin-network-technology-itim2101-lineal-color-itim2101-2.png' width='40px' height='40px' />" + " " + namevalue + "Office"
    document.querySelector(".loginnavbutton").style.height = "20px;"



    $("#mark-complete").click(function() {
        var parent_id = $(this).attr('order-id');
        $.post("includes/handlers/makeorderdone-handler.php", { order_id: parent_id }).done(function(response) {
            console.log(response)
            if (response == "")
                window.location.href = "";
        })
    })


    $("button[button-type='mark-delete']").click(function() {
        console.log("clicked")
        var parent_id = $(this).attr('order-id');
        $(document).ready(function(){
            $("#cardwow").slideDown(200);
            $(".table").css("opacity","0.2")
            $("#odno").text(parent_id)
            $("#close").click(function(){
                $("#cardwow").fadeOut(100)
                $(".table").css("opacity","1")
            })
            $("#header-close").click(function(){
                $("#cardwow").fadeOut(100)
                $(".table").css("opacity","1")
            })
            $("button[buttontype='del']").click(function(){
                console.log("deleting order no "+parent_id)
                $.post("includes/handlers/makeorderdelete-handler.php", { order_id: parent_id }).done(function(response) {
                    console.log(response)
                    if (response == "")
                        window.location.href = "";
                })
            })
                
        })
        
    })
});

$("#carslink").css("display", "none")

$("#contactlink").text("Logout")

$("#contactlink").parent().attr("href", "#")

$("#contactlink").click(function() {

    $.post("includes/handlers/logout-handler.php", function() {
        window.location.href = "index.php";
    })
})