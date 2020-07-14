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
   	,4000);

 	$(".slide").mouseenter(function(){
	    //alert($(this).html());
	    $('#myList li').html($(this).html())
  	});

 	//.TrendNGeSi
 	$(".trendNgheSi ul li").mouseenter(function(){
 		var strX1 = $(this).html();
 		$(".image-nghe-si li" ).html(strX1);
 		$(".name-nghe-si a p").text($("img",this).attr("alt"));
 	})
 	var index1 = 1;
   	var strB;
   	setInterval(function(){
	   	switch(index1) {
		  case 0:
		   strB = $(".trendNgheSi ul li:eq(0)").html();
		    $(".name-nghe-si a").attr("href",$(".trendNgheSi ul li:eq(0) a").attr("href"));
		    $(".name-nghe-si a p").text($(".trendNgheSi ul li:eq(0) img").attr("alt"));
		    index1++;
		    break;
		  case 1:
		    strB = $(".trendNgheSi ul li:eq(1)").html();
		    $(".name-nghe-si a").attr("href",$(".trendNgheSi ul li:eq(1) a").attr("href"));
		    $(".name-nghe-si a p").text($(".trendNgheSi ul li:eq(1) img").attr("alt"));
		    index1++;
		    break;
		  case 2:
		    strB = $(".trendNgheSi ul li:eq(2)").html();
		    $(".name-nghe-si a").attr("href",$(".trendNgheSi ul li:eq(2) a").attr("href"));
		    $(".name-nghe-si a p").text($(".trendNgheSi ul li:eq(2) img").attr("alt"));
		    index1++;
		    break;
		  case 3:
		    strB = $(".trendNgheSi ul li:eq(3)").html();
		    $(".name-nghe-si a").attr("href",$(".trendNgheSi ul li:eq(3) a").attr("href"));
		    $(".name-nghe-si a p").text($(".trendNgheSi ul li:eq(3) img").attr("alt"));
		    index1++;
		    break;
		   case 4:
		    strB = $(".trendNgheSi ul li:eq(4)").html();
		    $(".name-nghe-si a").attr("href",$(".trendNgheSi ul li:eq(4) a").attr("href"));
		    $(".name-nghe-si a p").text($(".trendNgheSi ul li:eq(4) img").attr("alt"));
		    index1++;
		    break;
		}
		if(index1 == 5)
			index1 = 0;
	 	//alert(strA.toString());
	   $('.image-nghe-si li').html(strB)}
   	,2500);




 	$(".box_chart_music .chart-choose li").click(function(){
 		var strX = $(this).text();
 		$(".box_chart_music .chart-choose a").removeClass("active");
 		$(".list-chart-music ul").addClass("hideShowCase");
 		//alert(strX);
 		switch(strX) {
		  case "Việt Nam":
		  	$("a", this).addClass("active");
		    $(".list-chart-music ul:eq(0)").removeClass("hideShowCase");
		    break;
		  case "Âu Mỹ":
		  	$("a", this).addClass("active");
		    $(".list-chart-music ul:eq(1)").removeClass("hideShowCase");
		    break;
		  case "Hàn Quốc":
		  	$("a", this).addClass("active");
		     $(".list-chart-music ul:eq(2)").removeClass("hideShowCase");
		    break;
		}
 	})

 	$(".box_chart_mv .chart-choose li").click(function(){
 		var strX = $(this).text();
 		$(".box_chart_mv .chart-choose a").removeClass("active");
 		$(".list-chart-mv ul").addClass("hideShowCase");
 		//alert(strX);
 		switch(strX) {
		  case "Việt Nam":
		  	$("a", this).addClass("active");
		    $(".list-chart-mv ul:eq(0)").removeClass("hideShowCase");
		    break;
		  case "Âu Mỹ":
		  	$("a", this).addClass("active");
		    $(".list-chart-mv ul:eq(1)").removeClass("hideShowCase");
		    break;
		  case "Hàn Quốc":
		  	$("a", this).addClass("active");
		     $(".list-chart-mv ul:eq(2)").removeClass("hideShowCase");
		    break;
		}
 	})



 	

});
