// Navigator Functions
navOpen = 0;
activeDiv = 0;
function navBar() {
    if (navOpen === 0) {
        document.getElementById("mySidenav").style.width = "9%";
        document.getElementById("main").style.marginLeft = "9%";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        navOpen = 1;
    } else {
        document.getElementById("mySidenav").style.width = "0%";
        document.getElementById("main").style.marginLeft = "0%";
        document.body.style.backgroundColor = "white";
        navOpen = 0;
        $('.fade').fadeOut();
    }
}
//Fading divs
function fadeClick(element) {
    $(".fade").fadeOut();
    $(element).fadeIn();
}
//Pausing video on div fade
function vidplay() {
    var video1 = document.getElementById("video1")
    var video2 = document.getElementById("video2")
    var video3 = document.getElementById("video3")
    var video4 = document.getElementById("video4")
    var video5 = document.getElementById("video5")
    var video6 = document.getElementById("video6")
    var video7 = document.getElementById("video7")
    var video8 = document.getElementById("video8")
    if (video1.play()) {
        video1.pause();
    }
    if (video2.play()) {
        video2.pause();
    }
    if (video3.play()) {
        video3.pause();
    }
    if (video4.play()) {
        video4.pause();
    }
    if (video5.play()) {
        video5.pause();
    }
    if (video6.play()) {
        video6.pause();
    }
    if (video7.play()) {
        video7.pause();
    }
    if (video8.play()) {
        video8.pause();
    }
}