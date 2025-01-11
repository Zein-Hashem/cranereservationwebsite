<?php
include('../config/connect.php');
$id=$_GET['id'];
$sql="DELETE FROM admin WHERE id=$id ";

$res=mysqli_query($conn, $sql);

if($res==TRUE){
    //echo "ADMIN DELETED";
    $_SESSION['delete']="<div class='succes'>Admin deleted successfully</div>";
    //go to manage page 
    header('location:'.SITEURL."admin/manage.php");

}else{
    //echo "ADMIN FAILED DELETED";
    $_SESSION['delete']="<div class='error'>Failed to delete Admin</div>";
    header('location:'.SITEURL."admin/manage.php");

}
?>