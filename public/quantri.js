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
	
	//console khi co su kien thay doi input 
	$("select.clnghesi").change(function(e){
		e.preventDefault();
		var p_current = $(this).parent().children("p.clnghesi").text();
		//alert(p_current);
		var optionSelected = $(this).children("option:selected").text();
		var checkSelected = p_current.indexOf(optionSelected);
		if(p_current == ""){
    		$(this).parent().children("p.clnghesi").html(optionSelected);
    	} else if(optionSelected != "--Select--" && checkSelected == -1){
    		$(this).parent().children("p.clnghesi").html(p_current + ","+ optionSelected);
    	} else {

    	}
    	//changeSelecttag("select.clnghesi:parent","p.clnghesi");
  	});
	$("select.cltheloai").change(function(){
		var p_current = $(this).parent().children("p.cltheloai").text();
		//alert(p_current);
		var optionSelected = $(this).children("option:selected").text();
		var checkSelected = p_current.indexOf(optionSelected);
		if(p_current == ""){
    		$(this).parent().children("p.cltheloai").html(optionSelected);
    	} else if(optionSelected != "--Select--" && checkSelected == -1){
    		$(this).parent().children("p.cltheloai").html(p_current + ","+ optionSelected);
    	} else {

    	}
	});
	$("select.clalbum").change(function(){
		var p_current = $(this).parent().children("p.clalbum").text();
		//alert(p_current);
		var optionSelected = $(this).children("option:selected").text();
		var checkSelected = p_current.indexOf(optionSelected);
		if(p_current == ""){
    		$(this).parent().children("p.clalbum").html(optionSelected);
    	} else if(optionSelected != "--Select--" && checkSelected == -1){
    		$(this).parent().children("p.clalbum").html(p_current + ","+ optionSelected);
    	} else {

    	}
	});
	$("select.clplaylist").change(function(){
		var p_current = $(this).parent().children("p.clplaylist").text();
		//alert(p_current);
		var optionSelected = $(this).children("option:selected").text();
		var checkSelected = p_current.indexOf(optionSelected);
		if(p_current == ""){
    		$(this).parent().children("p.clplaylist").html(optionSelected);
    	} else if(optionSelected != "--Select--" && checkSelected == -1){
    		$(this).parent().children("p.clplaylist").html(p_current + ","+ optionSelected);
    	} else {

    	}
	});
  	$("input[type=file][name=img]").on('change',function(){
  		//console.log(this.files[0]);
  		var file_data = $(this).prop('files')[0];
  		 var formData = new FormData();
  		  formData.append("img", file_data);
	     console.log(formData.get('img'));
  	});

  	$("input[type=file][name=img_square]").on('change',function(){
  		//console.log(this.files[0]);
  		var file_data = $(this).prop('files')[0];
  		 var formData = new FormData();
  		  formData.append("img_square", file_data);
	     console.log(formData.get('img_square'));
  	});

  	$("input[type=file][name=audio]").on('change',function(){
  		//console.log(this.files[0]);
  		var file_data = $(this).prop('files')[0];
  		 var formData = new FormData();
  		  formData.append("audio", file_data);
	     console.log(formData.get('audio'));
  	});
  	
  	//addbaihat
	$("#addBaihat").on('click',function(){
		//alert("The paragraph was clicked.outline");
		var name = $("input[type=text][name=tenbaihat]").val();
		var album = $("p.clalbum").text();
		var theloai = $("p.cltheloai").text();
		var playlist = $("p.clplaylist").text();
		var nghesi = $("p.clnghesi").text();
	    /*var file_img = $("input[type=file][name=img]").prop('files')[0];
	    var file_img_square = $("input[type=file][name=img_square]").prop('files')[0];
	    var file_audio = $("input[type=file][name=audio]").prop('files')[0];*/
	    var formData = new FormData($("form.form-baihat")[0]);
	    formData.delete("album");
	    formData.delete("theloai");
	    formData.delete("playlist");
	    formData.delete("nghesi");
	    formData.delete("name");

	    //
	 	formData.append("album", album);
	 	formData.append("name", name);
	 	formData.append("theloai", theloai);
	 	formData.append("playlist", playlist);
	 	formData.append("nghesi", nghesi);
	 	formData.append("table", "baihat");
	 	for (var value of formData.values()) {
		   console.log(value);
		}
		//console.log(formData.get("name"));
	    $.ajax({
                url: 'add-exc.php', 
                method: "POST",
                data: formData,
                contentType: false,
                cache:false,
                processData:false,
                success: function (res) {
                	alert("ket qua tra ve:" + res +":");
                }
            });
	    return false;
	});
	//deletebaihat
	$(".deleteBaihat").click(function(){
	 		var id = $("td:parent:eq(0)").text();
	 		var table = "baihat";
	 		var formData = new FormData();
		    formData.append("id", id);
		    formData.append("table", table);
		    //alert(JSON.stringify(formData));
	    $.ajax({
                url: 'delete-exc.php', 
                method: "POST",
                data: formData,
                contentType: false,
                cache:false,
                processData:false,
                success: function (res) {
                	alert(res);
                	location.reload();
                }
            });
	});
});