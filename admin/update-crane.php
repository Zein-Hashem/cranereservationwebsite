<?php
include('partials/category.php');
?>



<div class="main">
<div class="wrapper"></div>
<h1>crane update</h1>
<br><br>
<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
$sql="SELECT * FROM cranes WHERE id='$id'";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res); 
if($count==1){
        //echo"admin available";
        $row=mysqli_fetch_assoc($res);
        $title=$row['title'];
        $description=$row['description'];
        $price=$row['price'];
        $current_image=$row['image_name'];
        $category_id=$row['category_id'];
        $featured=$row['featured'];
        $active=$row['active'];


    }else{
        $_SESSION['update2']="<div class='error'>crane not found</div>";
        header('location:'.SITEURL.'admin/manage-crane.php');

    }   


}else{
    header('location:'.SITEURL."admin/manage-category.php");
}
?>
<form action="" method="POST" enctype="multipart/form-data">
<table class="tbl-30">
            <tr>
                <td>TITLE:</td>
                <td><input type="text"name="title"value="<?php echo $title?>"></td>
                <td></td>
            </tr>

            <tr>
                <td>DESCRIPTION:</td>
               
                <td> <textarea type="description"colspan="10"rows="10"name="description" value=""placeholder="new description"><?php echo $description?></textarea></td>
            </tr>


            <tr>
                    <td>price:</td>
                    <td>
                        <input type="number"name="price"placeholder="price"value="<?php echo $price?>">>
                    </td>
                </tr>

            <tr>
                <td>CURRENT IMAGE:</td>
                <td>
                    <?php
                    if($current_image!=""){
                        ?>
                        <img src="<?php echo SITEURL;?>images/cranes/<?php echo $current_image?>"width="150px">
                        <?php
                        
                            
                    }else{
                        echo "<div class='error'>image not added</div>";
                    }
                    ?>
                </td>
            </tr> 
           
            <tr>
                    <td>SELECT IMAGE:</td>
                    <td>
                        <input type="file"name="image">
                    </td>
                </tr>
                    
            <tr>
                    <td>CATEGORY ID:</td>
                    <td>
                        <select name="category">
                            <?php
                            $sql1="SELECT * FROM category WHERE active='yes'";
                            $res1=mysqli_query($conn,$sql1);
                            $count=mysqli_num_rows($res1);
                            if($count>0){
                                while($row=mysqli_fetch_assoc($res1)){
                                    $id1=$row['id'];
                                    $title=$row['title'];
                                    ?>
                                    <option value="<?php echo $id1?>">
                                    <?php
                                    echo $title
                                     ?>
                                     </option>
                                    <?php
                                    
                                }
                            }else{
                                ?>
                                <option value="0">no category found</option>
                                <?php
                            }

                            ?>
                            
                          
                        </select>
                        
                    </td>
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
                    <input type="submit"name="submit"value="update-crane"class="btn-secondary"></td>
            </tr>
            </table>
    </form>
    
</div>
</div>

<?php
if(isset($_POST['submit'])){
 
    $id=$_POST['id'];
    $title = $_POST['title'];
    $description=$_POST['description'];
    $price = $_POST['price'];
    $category=$_POST['category'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];
    $current_image=$_POST['current_image'];
    
   

    
   

    
    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];
      

        if($image_name!=""){
            $ext=end(explode('.',$image_name));

            $image_name="crane_".rand(000, 999).'.'.$ext;

            $source_path=$_FILES['image']['tmp_name'];
            

            $destination_path="../images/cranes/".$image_name;

            $upload= move_uploaded_file($source_path,$destination_path);

            if($upload==false){
                $_SESSION['upload']="error in uploading";
                header("location:".SITEURL.'admin/manage-crane.php');
                die();
            }
            if($current_image!=""){
                $remove_path="../images/cranes/".$current_image;

                $remove=unlink($remove_path);
    
                if($remove==false){
                   $_SESSION['remove-image']="<div class='error'>remove image failed</div>";
                   header('location:'.SITEURL.'admin/manage-crane.php');
                   die();
                }
                
            }
           
    }else{
        $image_name=$current_image;
    }
}else{
    $image_name=$current_image;
}


    $sql2="UPDATE cranes SET title='$title',description='$description',price='$price',image_name='$image_name',category_id='$category',featured='$featured',active='$active' WHERE id='$id' ";

    $res2=mysqli_query($conn,$sql2);
    if($res2===TRUE){
      
       $_SESSION['update2']="<div class='succes'>crane updated successfully</div>";
       header('location:'.SITEURL.'admin/manage-crane.php');
        


    }else{
      $_SESSION['update2']="<div class='error'>crane update failed</div>";
      header('location:'.SITEURL.'admin/manage-crane.php');
 
       
    }


}
?>

<?php
include('partials/footer.php');
?>