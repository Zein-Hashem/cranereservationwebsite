<?php

include('partials/category.php');
?>
 <div class="main">
 <div class="wrapper">
       <h1>Manage Order</h1>
       
       <br><br>
      <?php
       if(isset($_SESSION['update4'])){
        echo $_SESSION['update4'];
        unset($_SESSION['update4']);
       }
       ?>

       

       <br><br>
       
       <table class="tbl-full">
        <tr>
           <th>id</th>
           
           <th>crane-id</th>
           <th>nb days</th>
           <th>total </th>
           <th>date </th>
           <th>status</th>
           <th>name</th>
           <th>contact</th>
           <th>email</th>
           <th>address</th>
        </tr>

        <?php
        $sql='SELECT * FROM reservation ORDER BY id DESC';
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count>0){
            while($row=mysqli_fetch_assoc($res)){
                    
                    $id=$row['id'];
                    $cranes_id=$row['cranes_id'];
                    $days=$row['hours'];
                    $total=$row['total'];
                    $date=$row['date'];
                    $status=$row['status'];
                    $name=$row['name'];
                    $contact=$row['contact'];
                    $email=$row['email'];
                    $address=$row['address'];
                    ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $cranes_id;?></td>
                        <td><?php echo $days;?></td>
                        <td><?php echo $total;?></td>
                        <td><?php echo $date;?></td>
                        <td><?php echo $status;?></td>
                        <td><?php echo $name;?></td>
                        <td><?php echo $contact;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $address;?></td>
                        

                        <td>
                        <a href="<?php echo SITEURL; ?>admin/update-reserve.php?id=<?php echo $id;?>" class="btn-secondary">Update</a>   
                        
                        </td>
                    </tr>

                    <?php
                    
            }
        }else{
                echo"<tr><td colspan='10'class='error'>rservations not available</div>";
        }
        
        ?>

        

       </table>
</div>  
    </div>
<?php
include('partials/footer.php');
?>