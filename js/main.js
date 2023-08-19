$(function () {
  var navbar = $(".header-inner");
  // var top_nav = $(".top_nav");
  var logo1 = $(".logo1");
  var logo2 = $(".logo2");
  var togel1 = $(".toggel_btn1");
  var togel2 = $(".toggel_btn2");
  $(window).scroll(function () {
    if ($(window).scrollTop() <= 40) {
      // top_nav.css("display", "block");
      togel1.css("display", "block");
      togel2.css("display", "none");
      logo1.css("display", "block");
      logo2.css("display", "none");
      navbar.removeClass("navbar-scroll");
    } else {
      // top_nav.css("display", "none");
      togel1.css("display", "none");
      togel2.css("display", "block");
      logo1.css("display", "none");
      logo2.css("display", "block");
      navbar.addClass("navbar-scroll");
    }
  });
});
//-------------location--------------------
function myloc(){
  location.href = "https://goo.gl/maps/EDR6HWEbjRcqb64o7";
}
//   --------------------------------------------current-page---------------

const currentlink = location.href;
const menuitems = document.getElementsByClassName("nav-link");
// console.log(menuitems);
for (let i = 0; i < menuitems.length; i++) {
  if (menuitems[i].href === currentlink) {
    menuitems[i].className = "current";
  }
}

// ----------------number_validation-----------------------
function validateNumber(elem, alertId) {
  if (isNaN(elem.value)) {
    document.getElementById(alertId).innerHTML = " * Enter Only Number";
  } else {
    document.getElementById(alertId).innerHTML = "";

    if (elem.value.length > 10 || elem.value.length < 10) {
      document.getElementById(alertId).innerHTML = "* Enter Only 10 digits";
    }
  }
}

//----------------------------gallery---------------------
if ($.isFunction($.fn.owlCarousel)) {
  $(".gallery_slider_area").owlCarousel({
    // autoplay: true,
    slideSpeed: 1000,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    items: 4,
    loop: true,
    // rtl: true,
    mouseDrag: true,
    // nav: true,
    // center:true,
    navText: [
      '<i class="fa fa-arrow-left"></i>',
      '<i class="fa fa-arrow-right"></i>',
    ],
    margin: 10,
    // dots: true,
    // dotsEach: true,
    responsive: {
      320: {
        items: 1,
      },
      767: {
        items: 2,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 4,
      },
    },
  });

  //----------------------------Sponsors_slider_area---------------------
  $(".Sponsors_slider_area_1").owlCarousel({
    autoplay: true,
    slideSpeed: 1000,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    items: 4,
    loop: true,
    mouseDrag: true,

    navText: [
      '<i class="fa fa-arrow-left"></i>',
      '<i class="fa fa-arrow-right"></i>',
    ],
    margin: 20,
    dots: false,
    responsive: {
      320: {
        items: 1,
      },
      600: {
        items: 2,
      },
      767: {
        items: 3,
      },

      1000: {
        items: 4,
      },
    },
  });
  $(".Sponsors_slider_area_2").owlCarousel({
    autoplay: true,
    slideSpeed: 1000,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    items: 4,
    loop: true,
    mouseDrag: true,

    navText: [
      '<i class="fa fa-arrow-left"></i>',
      '<i class="fa fa-arrow-right"></i>',
    ],
    margin: 20,
    dots: false,
    responsive: {
      320: {
        items: 1,
      },
      600: {
        items: 2,
      },
      767: {
        items: 3,
      },

      1000: {
        items: 4,
      },
    },
  });
  $(".Sponsors_slider_area_3").owlCarousel({
    autoplay: true,
    slideSpeed: 1000,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    items: 4,
    loop: true,
    mouseDrag: true,
    navText: [
      '<i class="fa fa-arrow-left"></i>',
      '<i class="fa fa-arrow-right"></i>',
    ],
    margin: 20,
    dots: false,
    responsive: {
      320: {
        items: 1,
      },
      600: {
        items: 2,
      },
      767: {
        items: 3,
      },

      1000: {
        items: 4,
      },
    },
  });
  $(".Sponsors_slider_area_4").owlCarousel({
    autoplay: true,
    slideSpeed: 1000,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    items: 4,
    loop: true,
    mouseDrag: true,

    navText: [
      '<i class="fa fa-arrow-left"></i>',
      '<i class="fa fa-arrow-right"></i>',
    ],
    margin: 20,
    dots: false,
    responsive: {
      320: {
        items: 1,
      },
      600: {
        items: 2,
      },
      767: {
        items: 3,
      },

      1000: {
        items: 4,
      },
    },
  });
}
// -----------------------slick-carousel-for-gallery----------------
$(".slider-single").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  fade: true,
  arrows: false,
  asNavFor: ".slider-nav",
});

$(".slider-nav").slick({
  slidesToShow: 5,
  infinite: true,
  // autoplay: true,
  autoplaySpeed: 2000,
  slidesToScroll: 1,
  dots: true,
  arrows: true,
  asNavFor: ".slider-single",
  focusOnSelect: true,
  centerMode: true,
});

// --------------------------------Fancybox--------------
if ($.isFunction($.fn.fancybox)) {
  $('[data-fancybox],[data-fancybox="gallery"]').fancybox({});
}

//----------------Timer------------------------
let days = document.getElementById("current_day");
let hours = document.getElementById("current_hour");
let minuts = document.getElementById("current_minuts");
let second = document.getElementById("current_second");
// let btn = document.getElementById("btn");
// let date_y = document.getElementById("date_y");

// function start(){
// let new_value = date_y.value;
// const current_time= new_value;
// Retrieve the target date from local storage or set a default date
const storedTime = localStorage.getItem("target_new_date");
const current_time = storedTime || "26 Nov 2023"; // Change to your default date// console.log(current_time);
function countdown() {
  const newdate = new Date(current_time);
  const currentDate = new Date();

  let totleSecond = (newdate - currentDate) / 1000;
  // console.log(totleSecond);
  let T_days = Math.floor(totleSecond / 3600 / 24);
  // console.log(T_days);
  let T_hours = Math.floor(totleSecond / 3600) % 24;
  // console.log(T_hours);

  let T_minutes = Math.floor(totleSecond / 60) % 24;
  // console.log(T_minutes);

  let T_second = Math.floor(totleSecond) % 60;
  // console.log(T_second);

  days.innerHTML = T_days;
  hours.innerHTML = formateTime(T_hours);
  minuts.innerHTML = formateTime(T_minutes);
  second.innerHTML = formateTime(T_second);
}

function formateTime(time) {
  return time < 10 ? `0${time}` : time;
}
countdown();
setInterval(countdown, 1000);

// Store the target date in local storage
localStorage.setItem("target_new_date", current_time);
// }
