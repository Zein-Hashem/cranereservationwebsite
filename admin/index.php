<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crane rservation website</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    
<?php
include('partials/category.php');
?>

<?php
if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
        unset($_SESSION['login']);
       }
       ?>
      
    <!--main starts-->
    <div class="main">
        <div class="wrapper">
       <h1>Dashboard</h1>
       <div class="col-4 text-center">  
          <?php
          $sql='SELECT*FROM category';
          $res=mysqli_query($conn,$sql);
          $count=mysqli_num_rows($res);

          ?>
            <h1><?php echo $count?></h1>
            <br>
            categories
       </div>

       <div class="col-4 text-center">  
       <?php
          $sql2='SELECT*FROM admin';
          $res2=mysqli_query($conn,$sql2);
          $count2=mysqli_num_rows($res2);

          ?>
            <h1><?php echo $count2?></h1>
            <br>
            admins
       </div>

       <div class="col-4 text-center"> 
       <?php
          $sql3='SELECT*FROM cranes';
          $res3=mysqli_query($conn,$sql3);
          $count3=mysqli_num_rows($res3);

          ?> 
            <h1><?php echo $count3?></h1>
            <br>
            cranes
       </div>

       <div class="col-4 text-center">  
       <?php
          $sql4='SELECT*FROM reservation';
          $res4=mysqli_query($conn,$sql4);
          $count4=mysqli_num_rows($res4);

          ?> 
            <h1><?php echo $count4?></h1>
            <br>
            total reservation
       </div>

       <div class="col-4 text-center">  
       <?php
          $sql4='SELECT SUM(total)AS Total FROM reservation WHERE status="finished"';
          $res4=mysqli_query($conn,$sql4);
          $row4=mysqli_fetch_assoc($res4);
          $totalincome=$row4['Total'];

          ?> 
            <h1><?php echo $totalincome?>$</h1>
            <br>
            total income
       </div>


       <div class="clearfix"></div>

       
    </div>
        
    </div>
    <!--main ends-->

    

    <?php 
    include('partials/footer.php');
    ?>