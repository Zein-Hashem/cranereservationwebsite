<?php
include('../config/connect.php');
?>
<?php
session_destroy();

header('location:'.SITEURL.'admin/login.php');
?>