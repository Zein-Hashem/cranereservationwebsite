<?php
include('partials/category.php');
?>
<div class="main">
<div class="wrapper"></div>
<h1>change password</h1>
<br><br>
<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
}
?>
<form action="" method="POST">
<table class="tbl-30">
            <tr>
                <td>current password:</td>
                <td><input type="text"name="current"placeholder="current password"value=""></td>
                <td></td>
            </tr>
            <tr>
                <td>new password:</td>
                <td><input type="password"name="new"placeholder="new password"value=""></td>
                <td></td>
            </tr>
            <tr>
                <td>confirm password:</td>
                <td><input type="password"name="confirm"placeholder="confirm password"value=""></td>
                <td></td>
            </tr>

            <tr>
                
                <td colspqn=2> 
                    <input type="hidden"name="id"value="<?php echo $id ?>">
                    <input type="submit"name="submit"value="change password"class="btn-secondary"></td>
            </tr>
</table>
</form>
</div>
</div>

<?php
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $current=$_POST['current'];
    $newpassword=$_POST['new'];
    $confirm=$_POST['confirm'];

    $sql="SELECT * FROM admin WHERE id='$id' AND password='$current'";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE){
        $count=mysqli_num_rows($res); 
        if($count==1){
            if($newpassword==$confirm){
                $sql2="UPDATE admin SET password='$newpassword' WHERE id='$id'";
                $res2=mysqli_query($conn,$sql2);
                if($res2==TRUE){
                    $_SESSION['match']="password changed success";
                    header('location:'.SITEURL.'admin/manage.php');
                }else{
                    $_SESSION['notmatch']="error ";
                    header('location:'.SITEURL.'admin/manage.php');
                    
                }

            }else{
                $_SESSION['notmatch']="error";
               header('location:'.SITEURL.'admin/manage.php');

            }
        //echo"admin available";
        
       
        

    }else {
        $_SESSION['notfound']="user not found";
        header('location:'.SITEURL.'admin/manage.php');
        
    }

    }
}
?>
<?php
include('partials/footer.php');
?>

