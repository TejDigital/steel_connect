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