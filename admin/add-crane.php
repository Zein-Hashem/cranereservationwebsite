<?php

include('partials/category.php');
?>
<div class="main">
    <div class="wrapper">
        <h1>add crane</h1>
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
                    <td>title:</td>
                    <td>
                        <input type="text"name="title"placeholder="category title">
                    </td>
                </tr>

                <tr>
                    <td>description:</td>
                    <td>
                        <textarea type="description"colspan="10"rows="10"name="description"placeholder="description"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>price:</td>
                    <td>
                        <input type="number"name="price"placeholder="price">
                    </td>
                </tr>

                <tr>
                    <td>CATEGORY ID:</td>
                    <td>
                        <select name="category">
                            <?php
                            $sql="SELECT * FROM category WHERE active='yes'";
                            $res=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);
                            if($count>0){
                                while($row=mysqli_fetch_assoc($res)){
                                    $id=$row['id'];
                                    $title=$row['title'];
                                    ?>
                                    <option value="<?php echo $id?>">
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
        $description=$_POST['description'];
        $price = $_POST['price'];
        $category=$_POST['category'];


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

            $image_name="crane_".rand(000, 999).'.'.$ext;

            $source_path=$_FILES['image']['tmp_name'];
            

            $destination_path="../images/cranes/".$image_name;

            $upload= move_uploaded_file($source_path,$destination_path);

            if($upload==false){
                $_SESSION['upload']="error in uploading";
                header("location:".SITEURL.'admin/add-crane.php');
               
                die();

            }
        }

        }else{
            $image_name="";
        }

        $sql2 = "INSERT INTO `cranes` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES (NULL, '$title', '$description', '$price', '$image_name', '$category', '$featured', '$active')";
        $res2=mysqli_query($conn,$sql2);
    
        if ($res2=== TRUE) {
            $_SESSION['add']="<div class='succes'>crane added successfully</div>"; 
            header("location:".SITEURL.'admin/manage-crane.php');
        } else {
            $_SESSION['add']="<div class='error'>crane failed to be added</div>"; 
            header("location:".SITEURL.'admin/add-crane.php');
            
        }
    }
    ?>

    </div>
</div>




<?php
include('partials/footer.php');
?>



