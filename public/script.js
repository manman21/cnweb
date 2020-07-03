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

   var index = 1;
   var strA;
   setInterval(function(){
	   	switch(index) {
		  case 0:
		    strA = $(".img-choose-ul > li:eq(0)").html();index++;
		    break;
		  case 1:
		    strA = $(".img-choose-ul > li:eq(1)").html();index++;
		    break;
		  case 2:
		    strA = $(".img-choose-ul > li:eq(2)").html();index++;
		    break;
		  case 3:
		    strA = $(".img-choose-ul > li:eq(3)").html();index++;
		    break;
		}
		if(index == 4)
			index = 0;
	 	//alert(strA.toString());
	   $('#myList li').html(strA)}
   ,3000);

 	$(".slide").mouseenter(function(){
	    //alert($(this).html());
	    $('#myList li').html($(this).html())
  });
});