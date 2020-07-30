$(document).ready(function(){
	$urladmin = "http://localhost/cnweb/public/trangquantri.php";
	$urlindex = "http://localhost/cnweb/public/index.php";
	function getCookie(name) {
	  const value = `; ${document.cookie}`;
	  const parts = value.split(`; ${name}=`);
	  if (parts.length === 2) return parts.pop().split(';').shift();
	}


	$url = "http://localhost/cnweb/public/trangquantri.php";
        $("#btnDangnhap").click(function (e) {
        e.preventDefault();
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
                    alert(result);
                    if (result == 'false')
                    {
                        alert('khong dang nhap duoc');
                    } else {
                        var cookie_vaitro = getCookie("vaitro");
                        alert(cookie_vaitro);
                        if(cookie_vaitro == "0")
                        {
                            window.location.replace($urladmin); 
                        } else {
                            window.location.replace($urlindex); 
                            //location.reload(); 
                        }
                    }
               }

        });
        $("#modalLogin").modal("hide");
    });
        $("#btnDangxuat").click(function (e) {
        e.preventDefault();
        //alert("dang xuat");
        $.ajax({

            type : 'post', 
            url  : 'logout-exc.php',
            dataType : "text",
            success :  function(result)
                   {
                        alert(result);
                        location.reload(); 
                   }
        });
    });
    $("#btnDangki").click(function (e) {
        e.preventDefault();
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
                    alert(result);
                    if (result == 'false')
                    {
                        alert('Đăng kí thất bại!');
                    } else {
                            location.reload(); 
                    }
               }
        });
        $("#modalRegister").modal("hide");
        });

	
});