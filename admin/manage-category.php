<?php

include('partials/category.php');
?>
 <div class="main">
 <div class="wrapper">
       <h1>Manage category</h1>
       <br><br>
       <?php
       if(isset($_SESSION['delete2'])){
        echo $_SESSION['delete2'];
        unset($_SESSION['delete2']);
       }
       ?>
       
       <br><br>
       <?php if(isset($_SESSION['add2'])){
        echo $_SESSION['add2'];
        unset($_SESSION['add2']);
       }
       ?>
        <?php if(isset($_SESSION['remove'])){
        echo $_SESSION['remove'];
        unset($_SESSION['remove']);
       }
       if(isset($_SESSION['update2'])){
        echo $_SESSION['update2'];
        unset($_SESSION['update2']);
       }
       if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
       }
       if(isset($_SESSION['remove-image'])){
        echo $_SESSION['remove-image'];
        unset($_SESSION['remove-image']);
       }
       ?>
       <br><br>

       <a href="<?php echo SITEURL ;?>admin/add-category.php" class="btn-primary">ADD category</a>

       <br><br>
       
       <table class="tbl-full">
        <tr>
           <th>id</th>
           <th>title</th>
           <th>image-name</th>
           <th>featured</th>
           <th>active</th>
           <th>actions</th>
        </tr>

        <?php
        $sql="SELECT * FROM category ";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        $sn=1;
        if($count>0){
            while($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $title=$row['title'];
                $image_name=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active'];
                ?>
                <tr>
            <td><?php echo $sn++;?></td>
            <td><?php echo $title;?></td>
            <td>
                <?php
                if($image_name!=""){
                    ?>
                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>"width="100px">
                    <?php
                    

                }else{
                    echo"no image";
                }
                ?>
            </td>
            <td><?php echo $featured;?></td>
            <td><?php echo $active;?></td>
            
            <td>
            <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-secondary">Update category</a>   
            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete category</a>
            </td>
        </tr>

                <?php
                

            }


        }else{
            ?>
            <tr>
                <td colspan="6"><div>no category added</div></td>
            </tr>
            <?php


        }
        ?>

       


       </table>

       </div>  
    </div>
<?php
include('partials/footer.php');
?>