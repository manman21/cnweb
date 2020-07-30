<?php
include("lib_db.php");
if ($_POST)
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $checkUsernamesql = "SELECT tentaikhoan FROM nguoidung ";
    //echo($checkUsernamesql);exit();
    $checkUsername = select_list($checkUsernamesql);
    //print_r($checkUsername);exit();
    if(array_search($username, array_column($checkUsername, 'tentaikhoan')) !== FALSE){
        $checkMatkhausql = "SELECT * FROM nguoidung where tentaikhoan = '".$username."'";
        //echo($checkMatkhausql);exit();
        $checkMatkhau = select_one($checkMatkhausql);
        //print_r($checkMatkhau);exit();
        if($password != $checkMatkhau["matkhau"]){
            echo "Sai mật khẩu";
            exit();
        }
            $name = "user";
            $cookie_name = $checkMatkhau["tentaikhoan"];
            $vaitro = "vaitro";
            $cookie_vaitro = $checkMatkhau["vaitro"];
            if (!isset($_COOKIE['user']))
            {
                setcookie($name, $cookie_name, time() + (3600), "/");
                setcookie($vaitro,$cookie_vaitro , time() + (3600), "/"); 
            }
            else
            {
                setcookie($name, "", time() - (3600), "/");
                setcookie($vaitro,"" , time() - (3600), "/"); 
                
                setcookie($name, $cookie_name, time() + (3600), "/");
                setcookie($vaitro,$cookie_vaitro , time() + (3600), "/"); 
            }
            echo "Đăng nhập thành công!";
    } else {
        echo "Không tồn tại tài khoản: ".$username;
    }

    
}
?>
