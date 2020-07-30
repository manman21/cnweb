<?php
	include("lib_db.php");

	if (isset($_COOKIE['user']))
        {
        	$user_ = $_COOKIE['user'];
    } else{
        	$user_ = "khong co cookie!";
    }
    $sqlbaihat = "select * from baihat order by id desc
	 limit 10  ";
	//echo $sqlbaihat;exit();
	$baihat = select_list($sqlbaihat);
	//print_r($baihat);exit();
	$sqlnghesi = "select * from nghesi ";
	//echo $sqlbaihat;exit();
	$nghesis = select_list($sqlnghesi);
	//print_r($nghesis);exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>NhacCuaTui- Nghe nhac</title>
  <link rel="icon" type="image/png" href="images/logo1.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style_public.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	<script src="https://www.youtube.com/redirect?v=ylbWDYN_r0o&event=video_description&redir_token=QUFFLUhqbFJESWFJVHNoUGR2QkU2TmxFSElzM3MtR05SQXxBQ3Jtc0tsS01hekNMNHh6dDdjTU0xODl2X2tac3BOU1hDSldXSzk3aE9BR0QwNlR2YnZ2T0JSaUhVSnFQZnpIQVZRWERiY283T3V2VVNGQ2JvSmhfRkpvTDU5alh3VEktc2x6Zl9nS1RxUHdNMUNIWkVvQTY5OA%3D%3D&q=https%3A%2F%2Fcdn.jsdelivr.net%2Fnpm%2Fjs-cookie%402%2Fsrc%2Fjs.cookie.min.js"></script>

	<script src="script.js" type="text/javascript"></script>
 	<script src="login-logout.js" type="text/javascript"></script>
 	<script src="quantri.js" type="text/javascript"></script>
</head>
<style type="text/css">
table{
	font-family: Arial,Tahoma,Helvetica,sans-serif;
    font-size: 12px;
    width: 200px;
}
th{
	text-align: left;
}
th, td {
  border-bottom: 1px solid #ddd;
}
.left a{
	color: #A3362D;
}
.AddSearch{
	margin-right: 60px;
	float: right;
	list-style-type: disc;
	margin-bottom: 20px;
}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		
	})
</script>
<body>

<!-- Modal -->
<div id="modalLogin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Đăng Nhập</h4>
      </div>
	<div class="modal-body">
	<form method="POST" id="formm-login" >
	    <div class="form-group">
	      <label for="email">Tên Tài Khoản:</label>
	      <input type="text" class="form-control" placeholder="Tên Tài Khoản" name="username" id="txtTentaikhoan">
	    </div>
	    <div class="form-group">
	      <label for="pwd">Mật Khẩu:</label>
	      <input type="password" class="form-control" placeholder="Mật Khẩu" name="password" id="txtMatkhau">
	    </div>
	    <div class="form-group form-check">
	      <label class="form-check-label">
	        <input class="form-check-input" type="checkbox" name="remember"> Remember me
	      </label>
	    </div>
	   
	</form>
	</div>
    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
    	 <button id="btnDangnhap" type="submit" class="btn btn-primary">Submit</button>
     </div>
  
    </div>
  </div>
</div>


<div id="modalRegister" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Đăng Kí</h4>
      </div>
	<div class="modal-body">
	<form method="POST" id="form-register">
	    <div class="form-group">
	      <label for="email">Tên Tài Khoản:</label>
	      <input type="text" class="form-control" placeholder="Tên Tài Khoản" name="username" id="dkTentaikhoan">
	    </div>
	    <div class="form-group">
	      <label for="pwd">Mật Khẩu:</label>
	      <input type="password" class="form-control" placeholder="Mật Khẩu" name="password" id="dkMatkhau">
	    </div>
	    <div class="form-group form-check">
	      <label class="form-check-label">
	        <input class="form-check-input" type="checkbox" name="remember"> Remember me
	      </label>
	    </div>
	   
	</form>
	</div>
    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
    	 <button id="btnDangki" type="submit" class="btn btn-primary">Submit</button>
     </div>
  
    </div>
  </div>
</div>



	<div class="container ">
		<nav class="navbar navbar-expand-sm bg-white  fixed-top clear_both">
		  <!-- Brand/logo -->
			<a class="navbar-brand nav-brand" href="#" style="margin-left: 40px !important">
			    <img src="images/ic_bigo_talent.png" alt="logo" style="max-width: 100%;height: 30px">
			</a>
			  <!-- Links -->
			<ul id="navmenu" class="navbar-nav ">
			    <li class="nav-item">
			      <a class="nav-link" href="#">Bài Hát</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#"><b>Việt Nam</b></a></li>
			      				<li><a href="#">Nhạc Trẻ</a></li>
			      				<li><a href="#">Nhạc Trữ Tình</a></li>
			      				<li><a href="#">Remix Việt</a></li>
			      				<li><a href="#">Rap Việt</a></li>
			      				<li><a href="#">Tiền Chiến</a></li>
			      				<li><a href="#">Nhạc Trịnh</a></li>
			      				<li><a href="#">Rock Việt</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Âu Mỹ</b></a></li>
			      				<li><a href="#">Top</a></li>
			      				<li><a href="#">Rock</a></li>
			      				<li><a href="#">Electronica</a>/Dance</li>
			      				<li><a href="#">R&B/Rap</a></li>
			      				<li><a href="#">Blues/Jazz</a></li>
			      				<li><a href="#">Country</a></li>
			      				<li><a href="#">Latin</a></li>
			      				<li><a href="#">Indie</a></li>
			      				<li><a href="#">Khác</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Châu Á</b></a></li>
			      				<li><a href="#">Nhạc Hoa</a></li>
			      				<li><a href="#">Nhạc Hàn</a></li>
			      				<li><a href="#">Nhạc Thái</a></li>
			      				<li><a href="#">Nhạc Nhật</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Khác</b></a></li>
			      				<li><a href="#">Thiếu Nhi</a></li>
			      				<li><a href="#">Không Lời</a></li>
			      				<li><a href="#">Beat</a></li>
			      				<li><a href="#">Khác</a></li>
			      				<li><a href="#">Tui Hát</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#">Playlist</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#"><b>Việt Nam</b></a></li>
			      				<li><a href="#">Nhạc Trẻ</a></li>
			      				<li><a href="#">Nhạc Trữ Tình</a></li>
			      				<li><a href="#">Remix Việt</a></li>
			      				<li><a href="#">Rap Việt</a></li>
			      				<li><a href="#">Tiền Chiến</a></li>
			      				<li><a href="#">Nhạc Trịnh</a></li>
			      				<li><a href="#">Rock Việt</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Âu Mỹ</b></a></li>
			      				<li><a href="#">Top</a></li>
			      				<li><a href="#">Rock</a></li>
			      				<li><a href="#">Electronica</a>/Dance</li>
			      				<li><a href="#">R&B/Rap</a></li>
			      				<li><a href="#">Blues/Jazz</a></li>
			      				<li><a href="#">Country</a></li>
			      				<li><a href="#">Latin</a></li>
			      				<li><a href="#">Indie</a></li>
			      				<li><a href="#">Khác</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Châu Á</b></a></li>
			      				<li><a href="#">Nhạc Hoa</a></li>
			      				<li><a href="#">Nhạc Hàn</a></li>
			      				<li><a href="#">Nhạc Thái</a></li>
			      				<li><a href="#">Nhạc Nhật</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Khác</b></a></li>
			      				<li><a href="#">Thiếu Nhi</a></li>
			      				<li><a href="#">Không Lời</a></li>
			      				<li><a href="#">Beat</a></li>
			      				<li><a href="#">Khác</a></li>
			      				<li><a href="#">Tui Hát</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#">Tuyển Tập</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#"><b>Thể Loại</b></a></li>
			      				<li><a href="#">Nhạc Trẻ</a></li>
			      				<li><a href="#">Nhạc Trữ Tình</a></li>
			      				<li><a href="#">Nhạc Hàn</a></li>
			      				<li><a href="#">Nhạc Hoa</a></li>
			      				<li><a href="#">SoundTrack</a></li>
			      				<li><a href="#">Không Lời</a></li>
			      				
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Tâm Trạng</b></a></li>
			      				<li><a href="#">Buồn</a></li>
			      				<li><a href="#">Hưng Phần</a></li>
			      				<li><a href="#">Thất Tình</a></li>
			      				<li><a href="#">Nhạy Cảm</a></li>
			      				<li><a href="#">Nhẹ Nhàng</a></li>
			      				<li><a href="#">Nhớ Nhung</a></li>
			      				<li><a href="#">Vui Vẻ</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Khung Cảnh</b></a></li>
			      				<li><a href="#">Cafe</a></li>
			      				<li><a href="#">Bar - Club</a></li>
			      				<li><a href="#">Phòng Trà</a></li>
			      				<li><a href="#">Tắm - Bơi Lội</a></li>
			      				<li><a href="#">Gym</a></li>
			      				<li><a href="#">Lãng Mạn</a></li>
			      				<li><a href="#">Mưa</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Chủ Đề</b></a></li>
			      				<li><a href="#">Tình Yêu</a></li>
			      				<li><a href="#">Top 100</a></li>
			      				<li><a href="#">Weekend</a></li>
			      				<li><a href="#">Chill Out</a></li>
			      				<li><a href="#">Bất Hủ</a></li>
			      				<li><a href="#">Song Ca</a></li>
			      				<li><a href="#">Mashup</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#">Video</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#"><b>Việt Nam</b></a></li>
			      				<li><a href="#">Nhạc Trẻ</a></li>
			      				<li><a href="#">Nhạc Trữ Tình</a></li>
			      				<li><a href="#">Cách Mạng</a></li>
			      				<li><a href="#">Rap Việt</a></li>
			      				<li><a href="#">Rock Việt</a></li>
			      				
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Âu Mỹ</b></a></li>
			      				<li><a href="#">Top</a></li>
			      				<li><a href="#">Rock</a></li>
			      				<li><a href="#">Electronica</a>/Dance</li>
			      				<li><a href="#">R&B/Rap</a></li>
			      				<li><a href="#">Blues/Jazz</a></li>
			      				<li><a href="#">Country</a></li>
			      				<li><a href="#">Latin</a></li>
			      				<li><a href="#">Indie</a></li>
			      				<li><a href="#">Khác</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Châu Á</b></a></li>
			      				<li><a href="#">Nhạc Hoa</a></li>
			      				<li><a href="#">Nhạc Hàn</a></li>
			      				<li><a href="#">Nhạc Thái</a></li>
			      				<li><a href="#">Nhạc Nhật</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>KARAOKE</b></a></li>
			      				<li><a href="#">Nhạc Trẻ</a></li>
			      				<li><a href="#">Nhạc Trữ Tình</a></li>
			      				<li><a href="#">Cách Mạng</a></li>
			      				<li><a href="#">Remix Việt</a></li>
			      				<li><a href="#">Thiếu Nhi</a></li>
			      				<li><a href="#">Âu Mỹ</a></li>
			      				<li><a href="#">Khác</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#"><b>Khác</b></a></li>
			      				<li><a href="#">Thiếu Nhi</a></li>
			      				<li><a href="#">Clip Vui</a></li>
			      				<li><a href="#">Hài Kịch</a></li>
			      				<li><a href="#">Giải Trí Khác</a></li>
			      				<li><a href="#">Thể Loại Khác</a></li>
			      				<li><a href="#">Phim Việt Nam</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#">BXH</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#">Việt Nam</a></li>
			      				<li><a href="#">Âu Mỹ</a></li>
			      				<li><a href="#">Hàn Quốc</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#">Chủ Đề</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#">Hôm Nay Nghe Gì</a></li>
			      				<li><a href="#">Tình Yêu</a></li>
			      				<li><a href="#">Bất Hủ Âu Mỹ</a></li>
			      				<li><a href="#">Indie</a></li>
			      				<li><a href="#">Cover & Mashup</a></li>
			      				<li><a href="#">Wedding</a></li>
			      				<li><a href="#">Nhạc Thiếu Nhi</a></li>
			      				
			      			</ul>
			      			<ul>
			      				<li><a href="#">Chill Out</a></li>
			      				<li><a href="#">Hot</a></li>
			      				<li><a href="#">EDM</a></li>
			      				<li><a href="#">Nhạc Hoa Lời Việt</a></li>
			      				<li><a href="#">Coffe Time</a></li>
			      				<li><a href="#">Nhạc Phim</a></li>
			      				<li><a href="#">Nhạc Buồn</a></li>
			      			</ul>
			      			<ul>
			      				<li><a href="#">Accoustic</a></li>
			      				<li><a href="#">Hải Ngoại</a></li>
			      				<li><a href="#">Nhạc Bất Hủ Việt</a></li>
			      				<li><a href="#">Remix Việt</a></li>
			      				<li><a href="#">Gym</a></li>
			      				<li><a href="#">Bolero</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#">Top 100</a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#">Việt Nam</a></li>
			      				<li><a href="#">Âu Mỹ</a></li>
			      				<li><a href="#">Châu Á</a></li>
			      				<li><a href="#">Không Lời</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
				

			    <li class="nav-item">
			      <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
			      <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#">Nghệ Sĩ</a></li>
			      				<li><a href="#">Khám Phá</a></li>
			      				<li><a href="#">Sự Kiện - TV</a></li>
			      				<li><a href="#">Tin Tức Âm Nhạc</a></li>
			      			</ul>
			      		</li>
			      </ul>
			    </li>
			</ul>
			

			
			<span id="sidenavid"class="hideShowCase"><i class="fas fa-list-ul"></i></span>


			<ul id="menu-icon" class="navbar-nav ml-auto nav-icon">
				<?php if(!isset($_COOKIE['user'])){
				?>
				<li id="login" class="nav-item" >
				    <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
				    <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#" data-toggle="modal" data-target="#modalLogin">Đăng Nhập</a></li>
			      				<hr>
			      				<li><a href="#" data-toggle="modal" data-target="#modalRegister">Đăng Kí</a></li>
			      			</ul>
			      		</li>
			      	</ul>
				</li>
			<?php } else {?>
				<li id="logined" class="nav-item">
				    <a class="nav-link" href="#"><i class="fas fa-user-times"></i></a>
				    <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="javascript:" id="btnDangxuat">Đăng Xuất</a></li>
			      			</ul>
			      		</li>
			      	</ul>
				</li>
			<?php } ?>
				<li class="nav-item">
				    <a class="nav-link" href="#" style="color: #fab905 !important"><i class="fas fa-crown"></i></a>
				    <ul class="submenu hideShowCase">
			      		<li>
			      			<ul >
			      				<li><a href="#">Giới Thiệu</a></li>
			      				<hr>
			      				<li><a href="#">Mua NhacCuaTui VIP</a></li>
			      				<hr>
			      				<li><a href="#">Thông Tin Thanh Toán</a></li>
			      				<hr>
			      				<li><a href="#">Tin Tức VIP</a></li>
			      			</ul>
			      		</li>
			      	</ul>
				</li>
				<li class="nav-item">
				    <a class="nav-link" href="#"><i class="fas fa-headphones"></i></a>
				</li>
				<li class="nav-item">
				    <a class="nav-link" href="#"><i class="fas fa-cloud-upload-alt"></i></a>
				</li>
			</ul>
			<form class="form-inline ml-auto  " action="/action_page.php">
			    <div class="input-group">
			      <input type="text" class="form-control" placeholder="Tìm bài hát, video, ca sĩ">
			      <div class="input-group-prepend">
			        <span class="input-group-text"><i class="fas fa-search"></i></span>
			      </div>
			    </div>
			</form>
		</nav>
		
	</div>

	

	<div class="container-fluid margin_top" style="">
		<div class="row">
		    <div class="col-lg-9 left" style="padding: 30px 0px 0px 50px;">
		    	<ul class="quantri-list">
		    			<li class="">
		    				<ul class="AddSearch">
			    				<li><a href="add.php?table=baihat">Add</a></li>
			    				<li><a href="">Search</a></li>
		    				</ul>
		    				<h3>Danh sách bài hát</h3>
					    	<table style="width:100%">
							  <tr>
							    <th style="width: 10px;">id</th>
							    <th style="width: 50px;">Name</th>
							    <th style="width: 10px;">Nghệ Sĩ</th>
							    <th style="width: 10px;">Edit</th>
							    <th style="width: 10px;">Delete</th>
							  </tr>
							  <?php foreach ($baihat as $item) {?>
								<tr>
									<td><?php echo $item['id'];?></td>
									<td><?php echo $item['name'];?></td>
									<td>
										<?php 
											$idnghesis = explode(",", $item['idNghesi']);
											foreach ($idnghesis as $idnghesi) {
												foreach ($nghesis as $nghesi) {
												 	if($idnghesi == $nghesi["id"]){
												 	echo $nghesi["name"].",";
												 	break;
												 	}
												}
											}
										?>
										
									</td>
									<td><a href="edit.php?id=<?php echo $item['id'];?>&&table=baihat">Edit</a></td>
									<td><a href="javascript:" class="deleteBaihat">Delete</a></td>
								</tr>
								<?php } ?>
							  
							</table>
					    </li>
					  	<li class="hideShowCase">
					  		<p>2</p>
					    	<!-- <form action="/action_page.php">
					    							    <div class="form-group">
					    							      <label for="email">Tên Bài Hát:</label>
					    							      <input  class="form-control" id="email" placeholder="Enter email" name="email">
					    							    </div>
					    							    <div class="form-group">
					    							      <label for="pwd">Album:</label>
					    							      <input  class="form-control" id="pwd" placeholder="Enter password" name="pwd">
					    							    </div>
					    							    <div class="form-group">
					    							      <label for="pwd">Thể Loại:</label>
					    							      <input name="img" value=""/>
					    							    </div>
					    							    <div class="form-group">
					    							      <label for="email">Playlist:</label>
					    							      <input  class="form-control" id="email" placeholder="Enter email" name="email">
					    							    </div>
					    							    <div class="form-group">
					    							      <label for="email">Nghệ Sĩ:</label>
					    							      <input  class="form-control" id="email" placeholder="Enter email" name="email">
					    							    </div>
					    							    <div class="form-group">
					    							      <label for="email">Ảnh Lớn:</label>
					    							      <input class="form-control" id="email" placeholder="Enter email" name="email">
					    							    </div>
					    							    <div class="form-group">
					    							      <label for="email">Ảnh Nhỏ:</label>
					    							      <input class="form-control" id="email" placeholder="Enter email" name="email">
					    							    </div>
					    							    <div class="form-group">
					    							      <label for="email">Audio:</label>
					    							      <input class="form-control" id="email" placeholder="Enter email" name="email">
					    							    </div>
					    							    <button type="submit" class="btn btn-default">Submit</button>
					    							  </form> -->
					  	</li>
					  	<li class="hideShowCase">
					  		<p>3</p>
					  	</li>
					  	<li class="hideShowCase">
					  		<p>4</p>
					  	</li>
					  	<li class="hideShowCase">
					  		<p>5</p>
					  	</li>
					  	<li class="hideShowCase">
					  		<p>6</p>
					  	</li>
				  </ul>
		    </div>

		    <div class="col-lg-3 right">
		    	<ul class="control-quantri" id="control-quantri" style="">
		    		<li class="control-quantri-list"><a href="javascript:">Bài Hát</a>  			
		    		</li>
		    		<li class="control-quantri-list"><a href="javascript:">Nghệ Sĩ</a>  			
		    		</li>
		    		<li class="control-quantri-list"><a href="javascript:">Người Dùng</a>  			
		    		</li>
		    		<li class="control-quantri-list"><a href="javascript:">Playlist</a>  			
		    		</li>
		    		<li class="control-quantri-list"><a href="javascript:">Thể Loại</a>  			
		    		</li>
		    		<li class="control-quantri-list"><a href="javascript:">Chủ Đề</a>  			
		    		</li>
		    	</ul>
		    </div>

		    
	 </div>
	</div>
  




	<div class="footer">
	  <div class="container-footer">
	  	<ul>
	  		<li><i class="fas fa-map-marker-alt"></i>Tòa nhà HAGL Safomec, 7/1 Thành Thái,P14,Q10,Tp.HCM</li>
	  		<li><i class="fas fa-envelope"></i>support@nct.vn</li>
	  		<li><i class="fas fa-phone-alt"></i>(028)38687979</li>
	  		<li style="float: right; padding-right: 20px;"><i class="far fa-copyright"></i> NCT Corp.All rights reserved</li>
	  	</ul>
	  </div>
	</div>

</body>
</html>
