$(document).ready(function () {
  if($(window).scrollTop() > 50){
    $("header").addClass("scrolled");
    $(".login").addClass("scrolled");
  }
  $(window).scroll(function (){
    if($(document).scrollTop() > 50){
      $(".login").addClass("scrolled");
      $("header").addClass("scrolled");
    }
    else {
      $("header").removeClass("scrolled");
      $(".login").removeClass("scrolled");
    }
  });
});
