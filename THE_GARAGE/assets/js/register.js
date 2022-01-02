//when changing images uploaded 
$("#img_src1").change(function(e) {
    var fileName = e.target.files[0].name;
    $(".ui1").html(fileName)
        // Inside find search element where the name should display (by Id Or Class)
});

$("#img_src2").change(function(e) {
    var fileName = e.target.files[0].name;
    $(".ui2").html(fileName)
        // Inside find search element where the name should display (by Id Or Class)
});


//when clicking on upload button 
$(".upload-img1").click(function() {

    $("#img_src1").trigger('click');
});

$(".upload-img2").click(function() {
    $("#img_src2").trigger('click');
});


//prevent submitting form when clciking on buttons 
$('form button').on("click", function(e) {
    e.preventDefault();
});

toggle.addEventListener("click", () => {
    const register_form = document.querySelector(".register-form")
    if (document.body.classList.contains('show-nav')) {
        register_form.style.marginLeft = "20px";
        register_form.style.width = "80%";
    } else {
        register_form.style.margin = "0 auto";
        register_form.style.width = "90%";

    }

})



//validating email 
$("#email").on('keyup', function() {
    if (this.value.length > 0) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var test = re.test(String(this.value).toLowerCase());
        if (!test)
            $(".email-msg").text("Email not valid").css('color', 'red')
        else
            $(".email-msg").text("Email is valid").css('color', 'green');

    } else {
        $(".email-msg").text("")
    }
});


//validating password
$("#psw").on('keyup', function() {
    if (this.value.length > 0) {

        if (this.value.length < 8)
            $(".password-msg").text("Password should contain Minimum eight characters").css('color', 'red')
        else {

            const re2 = /((?![A-Za-z]{8}|[0-9]{8})[0-9A-Za-z]{8})/;
            var test = re2.test(String(this.value).toLowerCase());
            if (!test)
                $(".password-msg").text("Password should contain at least one letter and one number").css('color', 'darkblue')
            else
                $(".password-msg").text("Passsword is valid ").css('color', 'green');
        }

    } else {
        $(".password-msg").text("")
    }
})


//validating repeated password
$("#psw-repeat").on('keyup', function() {

    if (this.value.length > 0) {
        var password_value = $("#psw").val();
        var repeated_password = this.value;
        //console.log(password_value, repeated_password)
        if (password_value != repeated_password)
            $(".repeated-msg").text("Passwords doesn't match").css('color', 'red')
        else $(".repeated-msg").text("")
    } else {
        $(".repeated-msg").text("")
    }
})

//when scroliing down 
var lastScrollTop = 0;
$(window).scroll(function(event) {
    var st = $(this).scrollTop();
    if (st > lastScrollTop) {
        // downscroll code
        $(".form-container").css('background-color', '#d3d3d3');
    } else {
        // upscroll code
        $(".form-container").css('background-color', '#d3d3d3');
    }
    lastScrollTop = st;
});


$(window).scroll(function() {
    if ($(this).scrollTop() == 0) {
        $(".form-container").css('background-color', '#fff');
    }
});


//directing when signed in
$(document).ready(function() {
    var div = document.querySelector(".loggedinwow");
    if (div != null)
        setTimeOut(window.location.href = "index.php", 2000)
})