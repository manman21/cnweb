<?php

        if (isset($_COOKIE['user']))
        {
            setcookie("user", "", time() - (3600), "/");
            setcookie("vaitro","" , time() - (3600), "/"); 
            echo "Dang xuat thanh cong";
        } else {
          echo "chua dang nhap";
        }
?>
