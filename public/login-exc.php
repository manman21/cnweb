<?php
include("lib_db.php");
if ($_POST)
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $topSql = "SELECT * FROM nguoidung where tentaikhoan = '".$username."'";
    //echo($topSql);exit();
	$datauser = select_one($topSql);
	//print_r($datauser);//exit();

    if ($datauser && $password == $datauser["matkhau"])
    {
         $cookie_name = "user";
         $cookie_value = $datauser["tentaikhoan"];
        if (!isset($_COOKIE['user']))
        {
            setcookie($cookie_name, $cookie_value, time() + (3600), "/");
            setcookie("vaitro",$datauser["vaitro"] , time() + (3600), "/"); 
        }
        else
        {
            setcookie($cookie_name, "", time() - (3600), "/");
            setcookie("vaitro","" , time() - (3600), "/"); 
            
            setcookie($cookie_name, $cookie_value, time() + (3600), "/"); 
            setcookie("vaitro",$datauser["vaitro"] , time() + (3600), "/"); 
        }
?>
<p><?php //echo $user?></p>
<?php
    } else {
?>
 <h1>Tên đăng nhập hoặc mật khẩu sai!</h1>
<?php
    }
}
?>