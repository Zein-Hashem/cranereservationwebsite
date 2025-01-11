<?php
include('partials/category.php');
?>
<div class="main">
<div class="wrapper"></div>
<h1>Admin update</h1>
<br><br>
<?php
$id=$_GET['id'];
$sql="SELECT * FROM reservation WHERE id=$id";
$res=mysqli_query($conn,$sql);
if($res==TRUE){
    $count=mysqli_num_rows($res); 
    if($count==1){
        //echo"admin available";
        $row=mysqli_fetch_assoc($res);
        $days=$row['hours'];
        $date=$row['date'];
        $name=$row['name'];
        $email=$row['email'];
        $address=$row['address'];
        $contact=$row['contact'];
        $status=$row['status'];
        $total=$row['total'];
        $price=$total/$days;
        

    }else{
        header('location:'.SITEURL.'admin/manage.php');

    }   
}else{
    echo"false";

}
?>
<form action="" method="POST">
<table class="tbl-30">
            <tr>
                <td>crane id:</td>
                <td><b><?php
                echo $id;
                ?></b></td>
                
                
            </tr>

            <tr>
                <td>crane price:</td>
                <td><b><?php
                echo $price;
                ?></b></td>
                
                
            </tr>
            

            <tr>
                <td>days:</td>
                <td><input type="number"name="qty"value="<?php echo $days?>"></td>
                
            </tr>

            <tr>
                <td>status:</td>
                <td><select name="status">
                    <option value="reserved">RESERVED</option>
                    <option value="On progress">ON PROGRESS</option>
                    <option value="Finished">FINISHED</option>
                </select>
            </td>
                
            </tr>
            
            <tr>
                <td>date:</td>
                <td><input type="date"name="date"value="<?php echo $date?>"></td>
                
            </tr>
            <tr>
                <td>name:</td>
                <td><input type="text"name="name"value="<?php echo $name?>"></td>
                
            </tr>
            <tr>
                <td>email:</td>
                <td><input type="email" name="email" placeholder="E.g. hi@blabla.com"value="<?php echo $email?>"></td>
            </tr>
            
            <tr>
                <td>address:</td>
                <td><textarea name="address" rows="5" placeholder="E.g. Street, City, Country" ><?php echo $address?></textarea></td>
                
            </tr>

            <tr>
                <td>contact:</td>
                <td><input type="tel" name="contact"class="input-responsive"value="<?php echo $contact?>"></td>
            </tr>

            <tr>   
                <td colspqn=2> 
                    <input type="hidden"name="id"value="<?php echo $id ?>">
                    <input type="submit"name="submit"value="update order"class="btn-secondary"></td>
            </tr>
            

            </table>
    </form>
    
</div>
</div>

<?php
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $days=$_POST['qty'];
    $date=$_POST['date'];
    $contact=$_POST['contact'];
    $status=$_POST['status'];
    $total=$price*$days;




    $sql2="UPDATE reservation SET name='$name', email='$email',hours='$days',total='$total',status='$status',address='$address',date='$date',contact='$contact' WHERE id='$id'";

    $res2=mysqli_query($conn,$sql2);
    if($res2==TRUE){
      
       $_SESSION['update4']="<div class='succes'>order updated successfully</div>";
       header('location:'.SITEURL.'admin/manage-order.php');
        


    }else{
       $_SESSION['update4']="<div class='error'>order updated failed</div>";
       header('location:'.SITEURL.'admin/manage-order.php');

    }


}
?>

<?php
include('partials/footer.php');
?>