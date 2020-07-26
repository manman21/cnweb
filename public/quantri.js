$(document).ready(function(){

  $(".control-quantri-list").click(function(){
    //alert("Text: " + $(this).html());
    $(".control-quantri-list").css("background-color","#fff");
    $(this).css("background-color","#e74c3c");
    var table = $("a",this).text();
    var tables = ["Bài Hát", "Nghệ Sĩ", "Người Dùng", "Playlist", "Thể Loại", "Chủ Đề"];
    //alert(table+":"+tables[0]);
    var chuoi = '';
	$("ul.quantri-list").children().addClass("hideShowCase");
    for (i = 0; i < tables.length; i++) {
	  if(table == tables[i]){
	  	chuoi = ".quantri-list li:eq("+i+")";
	  	$(chuoi).removeClass("hideShowCase");
	  	break;
	  }
	}
  });
  
	/*$("#addBaihat").click(function(){
	  alert("The paragraph was clicked.");
	});*/
});