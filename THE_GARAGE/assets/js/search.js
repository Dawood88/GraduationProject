$(".loginnavbutton").css("fontsize", "20px")
$(".view-deal-details").click(function() {

    console.log("wow");
    var buttonElementId = $(this).parent().parent();
    console.log(buttonElementId)
    var card_id_selected = buttonElementId[0].getAttribute("carid");
    //console.log(card_id_selected);
    //console.log(buttonElementId[0].getAttribute("car-id"))
    $.post("includes/handlers/viewcarinfo-handler.php", { car_id: card_id_selected }).done(function(response) {

        response = response.split("\n")
            console.log(response)
            //var car_info = JSON.parse(response)[0];
        var basic_img = response[8];
        var car_description = response.slice(14).join();
        //console.log(car_description);
        $(".car-name-info").text(response[2] + " " +
            response[5])
        $(".car-name-info").attr("href", response[13])
        $(".car-name-info").attr("title", response[13])
        $(".price-wow").text(response[6] + " $ / day ")
            //console.log(basic_img)
        $(".carousel-image").attr("src", basic_img)
            //fill the images 

        $(".image2").attr("src", response[8])
        $(".image3").attr("src", response[9])
        $(".image4").attr("src", response[10])
        $(".image5").attr("src", response[11])
        $(".image6").attr("src", response[12])

        $(".prev").click(function() { plusSlides(-1) })
        $(".next").click(function() { plusSlides(1) })

        //control the images
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {

            var slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) { slideIndex = 1 } else if (n < 1) { slideIndex = slides.length }
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            //console.log(slideIndex)
            slides[slideIndex - 1].style.display = "block";

        }



        var close_btn = $("<i class='fa fa-times' style='cursor:pointer;margin-left:20px;color:black ;font-size:36px'id='close'></i>");
        $(".price-wow").append(close_btn)
        $(".doors-no").text(response[3] + " Doors ")
        $(".seats-no").text(response[4] + " Seats ")
        $(".description-info").text(car_description)
        if (response[7] == "1") {
            $("#gps").css("display", " block ")
                //console.log('ok')
        }

        $(".car-info").attr('data-info', response[0]);
        $(".car-info").fadeIn(1000);
        $(".full-container").css("opacity", "0.2")
        $("#footer").css("opacity", "0.2")


        $("#close").click(function() {
            //console.log('ok')
            $(".car-info").fadeOut(500)
            $(".full-container").css("opacity", "1")
            $("#footer").css("opacity", "1")
                //alert('hello')
        })


        $(".btn-grad").click(function() {
            var url = "rentcar-page1.php?carid=" + card_id_selected;
            location.href = url;
        })


    })
})
$('.view-details').click(function() {
    // reference clicked button via: $(this)
    console.log('hi')
    var buttonElementId = $(this).parent();
    var card_id_selected = buttonElementId[0].getAttribute("car-id");
    //console.log(buttonElementId[0].getAttribute("car-id"))
    $.post("includes/handlers/viewcarinfo-handler.php", { car_id: card_id_selected }).done(function(response) {

        response = response.split("\n")
            //console.log(response)
            //var car_info = JSON.parse(response)[0];
        var basic_img = response[8];
        var car_description = response.slice(14).join();
        //console.log(car_description);
        $(".car-name-info").text(response[2] + " " +
            response[5])
        $(".car-name-info").attr("href", response[13])
        $(".car-name-info").attr("title", response[13])
        $(".price-wow").text(response[6] + " $ / day ")
            //console.log(basic_img)
        $(".carousel-image").attr("src", basic_img)
            //fill the images 

        $(".image2").attr("src", response[8])
        $(".image3").attr("src", response[9])
        $(".image4").attr("src", response[10])
        $(".image5").attr("src", response[11])
        $(".image6").attr("src", response[12])

        $(".prev").click(function() { plusSlides(-1) })
        $(".next").click(function() { plusSlides(1) })

        //control the images
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {

            var slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) { slideIndex = 1 } else if (n < 1) { slideIndex = slides.length }
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            //console.log(slideIndex)
            slides[slideIndex - 1].style.display = "block";

        }



        var close_btn = $("<i class='fa fa-times' style='cursor:pointer;margin-left:20px;color:black ;font-size:36px'id='close'></i>");
        $(".price-wow").append(close_btn)
        $(".doors-no").text(response[3] + " Doors ")
        $(".seats-no").text(response[4] + " Seats ")
        $(".description-info").text(car_description)
        if (response[7] == "1") {
            $("#gps").css("display", " block ")
                //console.log('ok')
        }

        $(".car-info").attr('data-info', response[0]);
        $(".car-info").fadeIn(1000);
        $(".full-container").css("opacity", "0.05")
        $("#footer").css("opacity", "0.2")


        $("#close").click(function() {
            //console.log('ok')
            $(".car-info").fadeOut(500)
            $(".full-container").css("opacity", "1")
            $("#footer").css("opacity", "1")
                //alert('hello')
        })


        $(".btn-grad").click(function() {
            var url = "rentcar-page1.php?carid=" + card_id_selected;
            location.href = url;
        })


    })



})




