<?php

include('partials-front/menu.php');
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
        <?php
            $search=$_POST['search'];
            
            ?>
            
            <h2>cranes on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">cranes</h2>
            <?php
            $search=$_POST['search'];
            $sql="SELECT * FROM cranes WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0){
                  while($row=mysqli_fetch_assoc($res)){
                        $id=$row['id'];
                        $title=$row['title'];
                        $price=$row['price'];
                        $description=$row['description'];
                        $image_name2=$row['image_name'];

                  }
                  ?>
                    <div class="food-menu-box">
                    <div class="food-menu-img">
                   <?php
                    if($image_name=""){
                            echo"<div class='error'>image not found</div>";

                        }else{
                            ?>
                              <img src="<?php echo SITEURL;?>images/cranes/<?php echo $image_name2; ?>" class="img-responsive img-curve">
                            <?php

                            
                            }?>
                        
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title ?></h4>
                        <p class="food-price"><?php echo $price ?>$</p>
                        <p class="food-detail">
                        <?php echo $description ?></.
                        </p>
                        <br><br>

                        <a href="<?php echo SITEURL;?>reserve.php?cranes_id=<?php echo $id;?>" class="btn btn-primary">reserve Now</a>
                    </div>
                </div>

                  <?php
                  
            }else{
                echo"<div class='error'>crane not found</div>";
            }
            ?>
           


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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

</body>
</html>