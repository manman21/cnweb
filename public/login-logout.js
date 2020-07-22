$(document).ready(function(){
	$url = "http://localhost/cnweb/public/log-in.php";
	$url1 = "http://localhost/cnweb/public/index.php";
	$("#btnDangnhap").click(function () {
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
	function login_logout() {
	 $("#login").css("display","none");
	 $("#logined").css("display","inline");
	}


	$("#btnDangki").click(function () {
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
                        $('#content').html(result);
                        window.location.replace($url); 
                        //location.reload(); 
                    }
               }
        });



	    $("#modalRegister").modal("hide");
		});

});