<?php 


session_start();
session_destroy();
if(isset($_SESSION['email']))
{
    unset($_SESSION['email']);
}
header('location:login.php');

?>