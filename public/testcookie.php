<?php

        if (isset($_COOKIE['user']))
        {
           $user = $_COOKIE['user'];
           echo " User name is: ".$user;
        } else {
          echo "chua dang nhap";
        }
?>
