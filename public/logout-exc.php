<?php

        if (isset($_COOKIE['user']))
        {
            setcookie("user", "", time() - (3600), "/");
            setcookie("vaitro","" , time() - (3600), "/"); 
            echo "dang xuat thanh cong";
        } else {
          echo "chua dang nhap";
        }
?>