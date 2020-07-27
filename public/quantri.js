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
	
	//console khi co su kien thay doi input file
	$("select.clnghesi").change(function(){
    	changeSelecttag("select.clnghesi","p.clnghesi");
  	});
	$("select.cltheloai").change(function(){
		changeSelecttag("select.cltheloai","p.cltheloai");
	});
	$("select.clalbum").change(function(){
		changeSelecttag("select.clalbum","p.clalbum");
	});
	$("select.clplaylist").change(function(){
		changeSelecttag("select.clplaylist","p.clplaylist");
	});
    function changeSelecttag(selectt,pt){
    	var strPtag = $(pt).text();
    	//alert(strnghesi);
    	var selected = strPtag.indexOf($(selectt+" option:selected").text());
    	//alert(selected);
    	if(strPtag == ""){
    		$(pt).html($(selectt+" option:selected").text());
    	} else if($(selectt+" option:selected").text() != "--Select--" && selected == -1){
    		$(pt).html(strPtag + ","+$(selectt+" option:selected").text());
    	} else {

    	}
  	}


  	//Add bai hat
  	$("input[type=file][name=img]").on('change',function(){
  		//console.log(this.files[0]);
  		var file_data = $(this).prop('files')[0];
  		 var formData = new FormData();
  		  formData.append("img", file_data);
	     console.log(formData.get('img'));
  	});

  	$("input[type=file][name=img-square]").on('change',function(){
  		//console.log(this.files[0]);
  		var file_data = $(this).prop('files')[0];
  		 var formData = new FormData();
  		  formData.append("img", file_data);
	     console.log(formData.get('img'));
  	});

  	$("input[type=file][name=audio]").on('change',function(){
  		//console.log(this.files[0]);
  		var file_data = $(this).prop('files')[0];
  		 var formData = new FormData();
  		  formData.append("audio", file_data);
	     console.log(formData.get('audio'));
  	});
  	$("#addBaihat").click(function(){
		//alert("The paragraph was clicked.inline");
		var name = $("input[type=text][name=tenbaihat]").val();
		var album = $("p.clalbum").text();
		var theloai = $("p.cltheloai").text();
		var playlist = $("p.clplaylist").text();
		var nghesi = $("p.clnghesi").text();
	    var file_img = $("input[type=file][name=img]").prop('files')[0];
	    var file_img_square = $("input[type=file][name=img-square]").prop('files')[0];
	    var file_audio = $("input[type=file][name=audio]").prop('files')[0];
	    var formData = new FormData();
	    formData.append("img", file_img);
	    formData.append("img-square", file_img_square);
	    formData.append("audio", file_audio);
	    form_data.append("name", name);
	 	form_data.append("album", album);
	 	form_data.append("theloai", theloai);
	 	form_data.append("playlist", playlist);
	 	form_data.append("nghesi", nghesi);

	 	
	    $.ajax({
                url: 'add-exc.php', 
                method: "POST",
                data: formData,
                contentType: false,
                cache:false,
                processData:false,
                success: function (res) {
                	alert(res);
                }
            });
	});
});