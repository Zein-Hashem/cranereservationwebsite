<?php

include('partials-front/menu.php');
?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>crane-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for crane.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php
    if(isset($_SESSION['reserve'])){
        echo $_SESSION['reserve'];
        unset($_SESSION['reserve']);
       }
       if(isset($_SESSION['reserve2'])){
        echo $_SESSION['reserve2'];
        unset($_SESSION['reserve2']);
       }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
    
    
        
            <h2 class="text-center">Explore cranes</h2>
            <?php
            $sql='SELECT * FROM category WHERE active="yes" and featured="yes" LIMIT 3 ';
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);

            if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $id=$row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        ?>

                      <a href="<?php echo SITEURL;?>crane-categories.php?category_id=<?php echo $id;?>">
                       
                        <div class="box-3 float-container">
                            <div class="container1">
                            
                        
                        
                            <?php if($image_name==""){
                                echo "<div class='error'>image not available</div>";
                                }else{
                                ?>
                                  <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>"  class="img-responsive img-curve">
                                <?php

                                
                                }?>


                            <h3 class="text-white"><?php echo $title; ?></h3>
                       </div>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                        <?php
                    }


            }else{
                echo"<div class='error'>category no added</div>";
            }
            ?>

        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- MEnu Section Starts Here -->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br>
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Available cranes</h2>
            <?php
            $sql2="SELECT * FROM cranes WHERE active='yes'and featured='yes' LIMIT 6";
            $res2=mysqli_query($conn,$sql2);
            $count=mysqli_num_rows($res2);

            if($count>0){
                while($row=mysqli_fetch_assoc($res2)){
                    $id=$row['id'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $description=$row['description'];
                    $image_name=$row['image_name'];
                ?>
                <div class="food-menu-box">
                <div class="food-menu-img">
                <?php if($image_name==""){
                                echo "<div class='error'>image not available</div>";
                                }else{
                                ?>
                                  <img src="<?php echo SITEURL;?>images/cranes/<?php echo $image_name; ?>"  class="img-responsive img-curve">
                                <?php

                                
                                }?>
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title?></h4>
                    <p class="food-price"><?php echo $price ?>$</p>
                    <p class="food-detail">
                        <?php echo $description?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL;?>reserve.php?cranes_id=<?php echo $id;?>" class="btn btn-primary">reserve Now</a>
                </div>
            </div>
                <?php
                

                }

            }else{
                echo"<div class='error'>category no added</div>";

            }
            ?>

            

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="cranes.php">See All cranes</a>
        </p>
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

    

</body>
<?php

include('partials-front/footer.php');
?>
