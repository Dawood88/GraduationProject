$(".btn").click(function() {
    var car_id = $(".btn").attr("car-id")
    var office_no = $(".btn").attr("office-no")
    var url = "rentcar-page2.php?carid=" + car_id + "&officeno=" + office_no;
    location.href = url;
})