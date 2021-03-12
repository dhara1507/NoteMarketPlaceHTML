/*-----------------------------
            Preloader
----------------------------- */
$(window).on("load", function () { //make sure that full page is loaded 
    $("#status").fadeOut();
    $("#preloader").delay(350).fadeOut();
});
/*-------------------------------
            Show hide Password
--------------------------------*/
$(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $(".Lo");
    if (input.attr("type") === "password") {
        $(".Lo").attr("type", "text");
    } else {
        $(".Lo").attr("type", "password");
    }
});
$(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $(".sU");
    if (input.attr("type") === "password") {
        $(".sU").attr("type", "text");
    } else {
        $(".sU").attr("type", "password");
    }
});
/*---------------------------------
        Header
------------------------------------*/
/* Show and hide white navigation */
$(function () {
    //show/hide nav on page load
    showHideNav();
    $(window).scroll(function () {
        //show/hide nav on window Scroll
        showHideNav();
    });

    function showHideNav() {
        if ($(window).scrollTop() > 300) {
            //show white nav
            $("nav").addClass("white-nav-top");

            //Show Dark logo
            $(".navbar-brand img").attr("src", "images/Homepage/logo.png");


            //show back to top button 
            $("#back-to-top").fadeIn();

        } else {
            //Show White nav
            $("nav").removeClass("white-nav-top");

            //Show Dark logo
            $(".navbar-brand img").attr("src", "images/pre-login/top-logo.png");


            //Hide back to top button 
            $("#back-to-top").fadeOut();
        }
    }
});
/*--------------------------------
            Close
------------------------------------*/
$('.close-img').on('click',function(){
    $(this).removeClass('.modal-body');
});
/*-----------------------------
               Mobile menu
----------------------------- */
$(function () {
    //show mobile nav
    $("#mobile-nav-open-btn").click(function () {
        $("#mobile-nav").css("height", "100%");
    });
    //show mobile nav
    $("#mobile-nav-close-btn,#mobile-nav a").click(function () {
        $("#mobile-nav").css("height", "0%");
    });
});
/*-----------------------------
               Animation
----------------------------- */
/* animate on scroll*/
$(function () {
  new WOW().init();
});
$(window).on("load",function(){
    $("#home-heading").addClass("animated fadeInDown");
    $("#home-text").addClass("animated zoomIn");
    $("#home-btn").addClass("animated zoomIn")
});

