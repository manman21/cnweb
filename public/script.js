$(document).ready(function(){

  $(".nav-item").mouseenter(function(){
    $(".submenu",this).toggleClass("hideShowCase")
  });

  $(".nav-item").mouseleave(function(){
    $(".submenu",this).toggleClass("hideShowCase")
  });
  var x = 970;
  $(window).resize(function(){
    if($(window).width() <= x){
    	$("#sidenavid").removeClass("hideShowCase");
    }
    else{	
    	$("#sidenavid").addClass("hideShowCase");
    }
  });
  $("#sidenavid").click(function(){
    $("#navmenu",this).toggleClass("display-none")
  });
  function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
	}

  function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
   }
});