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

$(document).ready(function() {
    $(window).scroll( function(){
        $('.cat').each( function(i){
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if( bottom_of_window > bottom_of_object ){
                $(this).addClass("animated fadeInUp");
            }
        },10);
    });
    $(window).scroll( function(){
        $('#chetan').each( function(i){
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if( bottom_of_window > bottom_of_object ){
                $(this).addClass("animated fadeInLeft");
            }
        });
    });
    $(window).scroll( function(){
        $('#simran').each( function(i){
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if( bottom_of_window > bottom_of_object ){
                $(this).addClass("animated fadeInRight");
            }
        });
    });
});
