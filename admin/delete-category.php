<?php

include('../config/connect.php');



if(isset($_GET['id']) and isset($_GET['image_name'])){
    //echo("get value and delete");
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    if($image_name !=""){
        $path="../images/category/".$image_name;
        $remove=unlink($path);

        if($remove==false){
            $_SESSION['remove']="<div class='error'>failed to remove file image</div>";
            header('location:'.SITEURL.'admin/manage-categoery.php');
            die();
        }
    }
$sql="DELETE FROM category WHERE id=$id";
$res=mysqli_query($conn,$sql);

if($res==true){
    $_SESSION['delete2']="<div class='succes'>category deleted successfully</div>";
    header('location:'.SITEURL."admin/manage-category.php");
}


}else{
   
    header('location:'.SITEURL."admin/manage-category.php");
 
}


?>