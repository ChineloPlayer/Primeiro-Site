<?php
session_start();
require_once('includes/func.php');

    require("../connect.php");
            
            if(isset($_SESSION['user']))
            {
                $user = $_SESSION['user'];
                        header("location:indlog.php?logOK");
            }
            else{
                echo '<pre>';
                echo '<pre>';
                header("Location:login.php");
            }
            
    ?>