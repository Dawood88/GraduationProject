$(".signedin").click(function() {
    $(".signout").css("display", "block")
})

$(".signout").click(function() {
    console.log("clicked")
    $.post("includes/handlers/logout-handler.php", function() {
        location.reload();
    })
})

$("#btn-rent1").hover(function() {
    console.log("hovered");
    $("#btn-rent1").text("Rent Now")
}, function() {
    $("#btn-rent1").text($("#btn-rent1").attr("carprice") + "$/Day")
})


$("#btn-rent2").hover(function() {
    console.log("hovered");
    $("#btn-rent2").text("Rent Now")
}, function() {
    $("#btn-rent2").text($("#btn-rent2").attr("carprice") + "$/Day")
})

$("#btn-rent3").hover(function() {
    console.log("hovered");
    $("#btn-rent3").text("Rent Now")
}, function() {
    $("#btn-rent3").text($("#btn-rent3").attr("carprice") + "$/Day")
})