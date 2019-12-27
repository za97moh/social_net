$(window).scroll(scrollwindow);

function scrollwindow() {
  var tempScrollTop = $(window).scrollTop();

  if(tempScrollTop > 200){
   $("nav").css("background-color","#1f2833");
  }
  else{
      $("nav").css("background-color","rgb(99, 113, 128)");
  }
};

$(function(){
    $("#nav").load("nav.html");
    });