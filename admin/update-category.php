<?php
include('partials/category.php');
?>



<div class="main">
<div class="wrapper"></div>
<h1>category update</h1>
<br><br>
<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
$sql="SELECT * FROM category WHERE id=$id";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res); 
if($count==1){
        //echo"admin available";
        $row=mysqli_fetch_assoc($res);
        $title=$row['title'];
        $current_image=$row['image_name'];
        $featured=$row['featured'];
        $active=$row['active'];


    }else{
        $_SESSION['update2']="<div class='error'>category not found</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }   

}else{
    header('location:'.SITEURL."admin/manage-category.php");
}
?>
<form action="" method="POST"enctype="multipart/form-data">
<table class="tbl-30">
            <tr>
                <td>TITLE:</td>
                <td><input type="text"name="title"value="<?php echo $title?>"></td>
                <td></td>
            </tr>

            <tr>
                <td>CURRENT IMAGE:</td>
                <td>
                    <?php
                    if($current_image!=""){
                        ?>
                        <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image?>"width="150px">
                        <?php
                        
                            
                    }else{
                        echo "<div class='error'>image not added</div>";
                    }
                    ?>
                </td>
            </tr> 
           
            <tr>
                <td>NEW IMAGE:</td>
                <td><input type="file"name="image"value="<?php echo $image_name?>"></td>
                <td></td>
            </tr> 
            
            <tr>
                <td>FEATURED:</td>
                <td><input <?php if($featured=="yes"){echo "checked";}?> type="radio"name="featured"value="yes">yes</td>
                <td><input <?php if($featured=="no"){echo "checked";}?> type="radio"name="featured"value="no">no</td>
                <td></td>
            </tr> 

            <tr>
                <td>ACTIVE:</td>
                <td><input  <?php if($active=="yes"){echo "checked";}?>  type="radio"name="active"value="yes">yes</td>
                <td><input <?php if($active=="no"){echo "checked";}?> type="radio"name="active"value="no">no</td>
                <td></td>
            </tr> 

            <tr>
                
                <td colspqn=2> 
                    <input type="hidden"name="current_image"value="<?php echo $current_image; ?>">
                    <input type="hidden"name="id"value="<?php echo $id; ?>">
                    <input type="submit"name="submit"value="update-category"class="btn-secondary"></td>
            </tr>
            </table>
    </form>
    
</div>
</div>

<?php
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $title=$_POST['title'];
    $current_image=$_POST['current_image'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];

    
   

    
    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];

        if($image_name!=""){
            $ext=end(explode('.',$image_name));

            $image_name="crane_category_".rand(000, 999).'.'.$ext;

            $source_path=$_FILES['image']['tmp_name'];
            

            $destination_path="../images/category/".$image_name;

            $upload= move_uploaded_file($source_path,$destination_path);

            if($upload==false){
                $_SESSION['upload']="error in uploading";
                header("location:".SITEURL.'admin/manage-category.php');
                die();
            }
            if($current_image!=""){
                $remove_path="../images/category/".$current_image;

                $remove=unlink($remove_path);
    
                if($remove==false){
                   $_SESSION['remove-image']="<div class='error'>remove image failed</div>";
                   header('location:'.SITEURL.'admin/manage-category.php');
                   die();
                }
                
            }
           
    }else{
        $image_name=$current_image;
    }
}else{
    $image_name=$current_image;

}


    $sql3="UPDATE category SET title='$title',image_name='$image_name',featured='$featured',active='$active' WHERE id='$id' ";

    $res3=mysqli_query($conn,$sql3);
    if($res3===TRUE){
      
       $_SESSION['update2']="<div class='succes'>category updated successfully</div>";
       header('location:'.SITEURL.'admin/manage-category.php');
        


    }else{
      $_SESSION['update2']="<div class='error'>category update failed</div>";
      header('location:'.SITEURL.'admin/manage-category.php');
 
       
    }


}
?>

<?php
include('partials/footer.php');
?>