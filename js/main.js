$(function () {
    var navbar = $(".header-inner");
    var top_nav = $(".top_nav");
    $(window).scroll(function () {
      if ($(window).scrollTop() <= 40) {
        top_nav.css("display","block");
        navbar.removeClass("navbar-scroll");
      } else {
        top_nav.css("display","none");
        navbar.addClass("navbar-scroll");
      }
    });
  });

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
  $(".gallery_slider_area").owlCarousel({
    // autoplay: true,
    // slideSpeed: 1000,
    // autoplayTimeout: 2000,
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
      767: {
        items: 3,
      },
      600: {
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
  autoplay: true,
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
  $('[data-fancybox],[data-fancybox="gallery1"]').fancybox({});
}