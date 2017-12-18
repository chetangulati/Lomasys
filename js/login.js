$("#lhead").click(function () {
  $("#lhead").addClass("activelogin");
  $("#signup").removeClass("as");
  $("#login").addClass("al");
  $("#shead").removeClass("activesignup");
});

$("#shead").click(function (){
  $("#lhead").removeClass("activelogin");
  $("#signup").addClass("as");
  $("#login").removeClass("al");
  $("#shead").addClass("activesignup");
});

// error
