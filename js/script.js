window.onload = function() { myFunction(), myf() };
window.onscroll = function() { myFunction(), myf() };

var mainnavbar = document.getElementById("main-navbar");
var sticky = mainnavbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        mainnavbar.classList.add("sticky");
    } else {
        mainnavbar.classList.remove("sticky");
    }
}

function myf() {
    if ((window.pageYOffset + window.innerHeight) > (row2.offsetTop)) {
        row21.classList.add('animr');
        row22.classList.add('animl');
    }
    if ((window.pageYOffset + window.innerHeight) > (row3.offsetTop)) {
        row31.classList.add('animl');
        row32.classList.add('animr');
    }
}

var modalnav = document.getElementById("myModalnav");
var btnnav = document.getElementById("myBtnnav");
var spannav = document.getElementsByClassName("closenav")[0];

btnnav.onclick = function() {
    modalnav.style.display = "block";
}

spannav.onclick = function() {
    modalnav.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modalnav) {
        modalnav.style.display = "none";
    }
}

var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 7000);
}

var slideIndex2 = 1;
showSlides2(slideIndex2);

function plusSlides(n) {
    showSlides2(slideIndex2 += n);
}

function currentSlide(n) {
    showSlides2(slideIndex2 = n);
}

function showSlides2(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides2");
    var dots = document.getElementsByClassName("dot2");
    if (n > slides.length) { slideIndex2 = 1 }
    if (n < 1) { slideIndex2 = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active2", "");
    }
    slides[slideIndex2 - 1].style.display = "block";
    dots[slideIndex2 - 1].className += " active2";
}


function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

var xmsg;

function info_close() {
    document.getElementById("msg-container").style.display = "none";
    clearTimeout(xmsg)
}

function info_open(msg, color) {
    document.getElementById("msg-container").style.display = "block";
    document.getElementById("msg-content").innerHTML = msg;
    if (color == true) {
        document.getElementById("info-msg").style.backgroundColor = "#27ae60";
    } else {
        document.getElementById("info-msg").style.backgroundColor = "#c0392b";
    }
    xmsg = setTimeout(info_close, 5000);
}