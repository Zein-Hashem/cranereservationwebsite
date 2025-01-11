<?php

include('partials/category.php');
?>
 <div class="main">
 <div class="wrapper">
       <h1>Manage Crane</h1>
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
       if(isset($_SESSION['update2'])){
        echo $_SESSION['update2'];
        unset($_SESSION['update2']);
       }
       if(isset($_SESSION['delete3'])){
        echo $_SESSION['delete3'];
        unset($_SESSION['delete3']);
       }
       if(isset($_SESSION['remove-image'])){
        echo $_SESSION['remove-image'];
        unset($_SESSION['remove-image']);
       }

       ?>
       
       <br><br>

<a href="<?php echo SITEURL;?>admin/add-crane.php" class="btn-primary">ADD crane</a>

<br><br>

<table class="tbl-full">
        <tr>
           <th>id</th>
           <th>title</th>
           <th>description</th>
           <th>price</th>
           <th>image-name</th>
           <th>category</th>
           <th>featured</th>
           <th>active</th>
           <th>actions</th>
        </tr>

        <?php
        $sql="SELECT * FROM cranes ";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        $sn=1;
        if($count>0){
            while($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $title=$row['title'];
                $descriptiom=$row['description'];
                $price=$row['price'];
                $image_name=$row['image_name'];
                $category_id=$row['category_id'];
                $featured=$row['featured'];
                $active=$row['active'];
                ?>
                <tr>
            <td><?php echo $id;?></td>
            <td><?php echo $title;?></td>
            <td><?php echo $descriptiom;?></td>
            <td><?php echo $price;?>$</td>
            
            <td>
                <?php
                if($image_name!=""){
                    ?>
                    <img src="<?php echo SITEURL;?>images/cranes/<?php echo $image_name; ?>"width="100px">
                    <?php
                    

                }else{
                    echo"no image";
                }
                ?>
            </td>
         
            <td><?php echo $category_id;?></td>
            <td><?php echo $featured;?></td>
            <td><?php echo $active;?></td>
            
            <td>
            <a href="<?php echo SITEURL;?>admin/update-crane.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-secondary">Update crane</a>   
            <a href="<?php echo SITEURL; ?>admin/delete-crane.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete crane</a>
            </td>
        </tr>

                <?php
                

            }


        }else{
            ?>
            <tr>
                <td colspan="6"><div>no crane added</div></td>
            </tr>
            <?php


        }
        ?>

       


       </table>

       </div>  
    </div>
   <?php
    if(isset($_SESSION['update3'])){
        echo $_SESSION['update3'];
        unset($_SESSION['update3']);
       }
       ?>

<?php
include('partials/footer.php');
?>