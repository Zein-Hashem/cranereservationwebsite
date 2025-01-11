<?php
if(!isset($_SESSION['user'])){
$_SESSION['nologin']="please login to admin panel";
header('location:'.SITEURL.'admin/login.php');
}
?>