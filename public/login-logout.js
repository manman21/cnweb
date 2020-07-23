$(document).ready(function(){
	$url = "http://localhost/cnweb/public/trangquantri.php";
	$url1 = "http://localhost/cnweb/public/index.php";
	$("#btnDangnhap").click(function () {
		var username = $("#txtTentaikhoan").val();
        var password = $("#txtMatkhau").val();
        if (username == '') {
            alert('Vui lòng nhập tài khoản');
            return false;
        }
        if (password == '') {
            alert('Vui lòng nhập mật khẩu');
            return false;
        }
        var data = $('#modalLogin form').serialize();
        //alert(data);
        $.ajax({
        type : 'post', 
        url  : 'login-exc.php',
        dataType : "text",
        data : data,
        success :  function(result)
               {
               		//alert(result);
                    if (result == 'false')
                    {
                        alert('Sai tên đăng nhập hoặc mật khẩu');
                    } else {
                    	var cookie_vaitro = getCookie("vaitro");
                        //$('#content').html(cookie_vaitro);
                        if(cookie_vaitro == "0")
                        {
                        	window.location.replace($url); 
                        } else {
                        	//window.location.replace($url1); 
                        	location.reload(); 
                        }
                    }
               }
        });
	    $("#modalLogin").modal("hide");
		});


	function getCookie(name) {
	  const value = `; ${document.cookie}`;
	  const parts = value.split(`; ${name}=`);
	  if (parts.length === 2) return parts.pop().split(';').shift();
	}


	$("#btnDangki").click(function () {
		var username = $("#dkTentaikhoan").val();
        var password = $("#dkMatkhau").val();
        if (username == '') {
            alert('Vui lòng nhập tài khoản');
            return false;
        }
        if (password == '') {
            alert('Vui lòng nhập mật khẩu');
            return false;
        }
        var data = $('#modalRegister form').serialize();
        //alert(data);
        $.ajax({
        type : 'post', 
        url  : 'register-exc.php',
        dataType : "text",
        data : data,
        success :  function(result)
               {
               		//alert(result);
                    if (result == 'false')
                    {
                        alert('Đăng kí thất bại!');
                    } else {
                    	var cookie_vaitro = getCookie("vaitro");
                        //alert(cookie_vaitro);
                        if(cookie_vaitro == "0")
                        {
                        	//window.location.replace($url); 
                        } else {
                        	location.reload(); 
                        }
                    }
               }
        });
	    $("#modalRegister").modal("hide");
		});

	
});