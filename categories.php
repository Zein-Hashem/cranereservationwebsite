<?php

include('partials-front/menu.php');
?>



<section class="categories">
    
    
        
            <h2 class="text-center">Explore Foods</h2>
            <?php
            $sql='SELECT * FROM category WHERE active="yes" ';
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