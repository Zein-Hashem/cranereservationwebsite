<?php
include('partials/category.php');
?>


    <!--main starts-->
    <div class="main">
        <div class="wrapper">
       <h1>Manage Admin</h1>
       <br>
       <?php
       if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
       }

       if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
       }
       if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
       }
       if(isset($_SESSION['notfound'])){
        echo $_SESSION['notfound'];
        unset($_SESSION['notfound']);
       }
       if(isset($_SESSION['notmatch'])){
        echo $_SESSION['notmatch'];
        unset($_SESSION['notmatch']);
       }
       if(isset($_SESSION['match'])){
        echo $_SESSION['match'];
        unset($_SESSION['match']);
       }
       ?>
       
       <br><br>

       <a href="addadmin.php" class="btn-primary">ADD Admin</a>

       <br><br>
       
       <table class="tbl-full">
        <tr>
           <th>id</th>
           <th>full name</th>
           <th>username</th>
           <th>actions</th>
        </tr>

        <?php
        $sql='SELECT * FROM admin';

        $res=mysqli_query($conn,$sql);
        if($res==TRUE){
                $count=mysqli_num_rows($res);
        }
        $sn=1;
        if($count>0){
            while($rows=mysqli_fetch_assoc($res))
            {
                $id=$rows['id'];
                $full_name=$rows['full_name'];
                $username=$rows['username'];
               

                ?>
                <tr>
                <td><?php echo $sn++;?></td>
                <td><?php echo $full_name;?></td>
                <td><?php echo $username?></td>
                <td>
                <a href="<?php echo SITEURL;?>admin/updateadmin.php?id=<?php echo $id; ?>" class="btn-secondary">Update admin</a>   
                <a href="<?php echo SITEURL;?>admin/changepassword.php?id=<?php echo $id; ?>" class="btn-secondary">change password</a>
                <a href="<?php echo SITEURL;?>admin/deleteadmin.php?id=<?php echo $id; ?>" class="btn-delete">Delete admin</a>
                
                </td>
                </tr>
            
                <?php


            }

            }

        
        
        ?>

       
       </table>

       
    </div>
        
    </div>
    <!--main ends-->
    <?php
include('partials/footer.php');
?>