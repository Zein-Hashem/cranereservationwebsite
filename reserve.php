<?php
include('partials-front/menu.php');
?>


<?php
if(isset($_GET['cranes_id'])){
$cranes_id=$_GET['cranes_id'];

$sql="SELECT * FROM cranes WHERE id=$cranes_id";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
if($count==1){
    $row=mysqli_fetch_assoc($res);
    $title=$row['title'];
    $price=$row['price'];
    $image_name4=$row['image_name'];
    
}else{
    header('location:'.SITEURL);
}

}else{
    header('location:'.SITEURL);
}
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your reservation.</h2>

            <form action=""method="POST" class="order">
                <fieldset>
                    <legend>Selected crane</legend>

                    <div class="food-menu-img">
                        <?php
                        if($image_name=""){
                                echo"<div class='error'>no image availabel</div>";
                        }else{
                                ?>
                               <img src="<?php echo SITEURL;?>images/cranes/<?php echo $image_name4; ?>"class="img-responsive img-curve">
                                <?php
                                
                        }
                        ?>
                       
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden"name="crane"value="<?php echo $title;?>">
                        <p class="food-price"><?php echo $price;?>$</p>
                        <input type="hidden"name="price"value="<?php echo $price;?>">
                        <div class="order-label">Nb of days:</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Zein hashem" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@blabla.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
            if(isset($_POST['submit'])){
                $crane=$_POST['crane'];
                $price=$_POST['price'];
                $days=$_POST['qty'];
                $total=$price*$days;
             
                $order_date=date("Y-m-d H:i:s");

                $status="reserved";
                $customer_name=$_POST['full-name'];
                $customer_contact=$_POST['contact'];
                $customer_email=$_POST['email'];
                $customer_address=$_POST['address'];
               


                $sql3="INSERT INTO `reservation` (`id`, `cranes_id`, `hours`, `total`, `date`, `status`, `name`, `contact`, `email`, `address`) VALUES (NULL, '$cranes_id', '$days', '$total', '$order_date', '$status', '$customer_name', '$customer_contact', '$customer_email', '$customer_address')";
                $res3=mysqli_query($conn,$sql3);

                
                if($res3){
                    $_SESSION['reserve']="<div class='succes'>reserved successfully</div>"; 
                    header("location:".SITEURL).'index.php';
                }else{
                    //$_SESSION['reserve']="<div class='error'>reservation failed</div>"; 
                    //header("location:".SITEURL.'index.php');
                    echo "Error: " . $sql . "<br>" . $conn->error;

                }

            }else{
               //header("location:".SITEURL.'index.php');
            }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="https://www.facebook.com/profile.php?id=100045276806284&mibextid=ZbWKwL"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="abouhabibcranes@gmail.com"><img src="images/4202011_email_gmail_mail_logo_social_icon.png"class='gmail'></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <?php

include('partials-front/footer.php');
?>

    <!-- footer Section Ends Here -->

</body>
</html>