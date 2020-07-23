<?php
include("lib_db.php");
if ($_POST)
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $nguoidung = array("tentaikhoan"=>$username , "matkhau"=>$password);

    //$topSql = "SELECT * FROM nguoidung where tentaikhoan = '".$username."'";
    //echo($topSql);exit();
	$datauser = data_to_sql_insert("nguoidung",$nguoidung);
	//print_r($datauser);exit();
    $ret = exec_update($datauser);
    if ($ret == 1)
    {
         $cookie_name = "user";
         $cookie_value = $username;
        if (isset($_COOKIE['user']))
        {
            setcookie($cookie_name, $cookie_value, time() + (3600), "/");
            setcookie("vaitro","1" , time() + (3600), "/"); 
        }
        else
        {
            setcookie($cookie_name, "", time() - (3600), "/");
            setcookie("vaitro","" , time() - (3600), "/"); 
            
            setcookie($cookie_name, $cookie_value, time() + (3600), "/"); 
            setcookie("vaitro","1" , time() + (3600), "/"); 
        }
?>
<p>tao thanh cong</p>
<?php
    } else {
?>
 <h1>tao that bai</h1>
<?php
    }
}
?>