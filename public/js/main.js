$(function(){
  $("#scrollUp").click(function() {
    $("html,body").animate({scrollTop:0}, 300);
  }); 

/*  $(window).bind('scroll',function(){
    var zhuangtai = $("#scrollUp").css('display');
    if(zhuangtai == "none"){
      $('#scrollUp').css("display","block")
      setTimeout(scrollNone,3000)
    }
  });

  function scrollNone(){
    $('#scrollUp').css("display","none");
  }*/

  $(".navbar-nav").find("li").each(function () {
    var a = $(this).find("a:first")[0];
    var b = $(a).attr("href");
    var c = window.location.href;
    b = b.split(/\//)[3];
    c = c.split(/\//)[3];

    if (c == '' && typeof(b) == "undefined"){
      $(this).addClass("active");
    }else{
      $(this).removeClass("active");

      if (c.indexOf(b) >= 0) {
        $(this).addClass("active");
      } else {
        $(this).removeClass("active");
      }
    }
  });

/*    $(".menu-list").find("a").each(function () {
        //var a = $(this).find("first")[0];
        var b = $(this).attr("href");
        var c = window.location.href;
        b = b.split(/\//)[3];
        c = c.split(/\//)[3];

        if (c == '' && typeof(b) == "undefined"){
          $(this).addClass("active");
        }else{
          $(this).removeClass("active");
          
          if (c.indexOf(b) >= 0) {
              $(this).addClass("active");
            } else {
              $(this).removeClass("active");
            }
        }
      });*/
});



