<?php

include('../config/connect.php');



if(isset($_GET['id']) and isset($_GET['image_name'])){
    //echo("get value and delete");
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    if($image_name !=""){
        $path="../images/cranes/".$image_name;
        $remove=unlink($path);

        if($remove==false){
            $_SESSION['remove']="<div class='error'>failed to remove file image</div>";
            header('location:'.SITEURL.'admin/manage-crane.php');
            die();
        }
    }
$sql="DELETE FROM cranes WHERE id=$id";
$res=mysqli_query($conn,$sql);

if($res==true){
    $_SESSION['delete3']="<div class='succes'>crane deleted successfully</div>";
    header('location:'.SITEURL."admin/manage-crane.php");
}


}else{
   
    header('location:'.SITEURL."admin/manage-crane.php");
 
}


?>