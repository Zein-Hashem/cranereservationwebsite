<?php

include('partials/category.php');
?>
<div class="main">
    <div class="wrapper">
        <h1>add category</h1>
        <br><br>
        <?php 
        if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
       }
       if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
       }
       ?>
       <br><br>

        <form action=""method="POST"enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>TITLE:</td>
                    <td>
                        <input type="text"name="title"placeholder="category title">
                    </td>
                </tr>

                <tr>
                    <td>SELECT IMAGE:</td>
                    <td>
                        <input type="file"name="image">
                    </td>
                </tr>

                <tr>
                    <td>FEATURED:</td>
                    <td>
                        <input type="radio"name="featured"value="yes">yes
                        <input type="radio"name="featured"value="no">no
                    </td>
                </tr>


                <tr>
                    <td>ACTIVE:</td>
                    <td>
                        <input type="radio"name="active"value="yes">yes
                        <input type="radio"name="active"value="no">no
                    </td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit"name="submit"value="addcategory"class="btn-secondary"></td>
                </tr>
            </table>
    </form>
   

    <?php
    if(isset($_POST['submit'])){
     
        
        $title = $_POST['title'];
        if(isset($_POST['featured'])){
            $featured=$_POST['featured'];
        }else{
            $featured="no";
        }

        if(isset($_POST['active'])){
            $active=$_POST['active'];
        }else{
            $active="no";
        }
        //print_r($_FILES['image']);
        //die();
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
                header("location:".SITEURL.'admin/add-category.php');
               
                die();

            }
        }

        }else{
            $image_name="";
        }

        $sql = "INSERT INTO category (`id`, `title`, `image_name`, `featured`, `active`) VALUES (NULL, '$title', '$image_name', '$featured', '$active')";
        $res=mysqli_query($conn,$sql);
    
        if ($res === TRUE) {
            $_SESSION['add2']="<div class='succes'>crane added successfully</div>"; 
            header("location:".SITEURL.'admin/manage-category.php');
        } else {
            $_SESSION['add2']="<div class='error'>crane failed to be added</div>"; 
            header("location:".SITEURL.'admin/add-category.php');
        }
    }
    ?>

    </div>
</div>




<?php
include('partials/footer.php');
?>



