<?php
include('partials/category.php');
?>
<div class="main">
<div class="wrapper"></div>
<h1>Admin update</h1>
<br><br>
<?php
$id=$_GET['id'];
$sql="SELECT * FROM admin WHERE id=$id";
$res=mysqli_query($conn,$sql);
if($res==TRUE){
    $count=mysqli_num_rows($res); 
    if($count==1){
        //echo"admin available";
        $row=mysqli_fetch_assoc($res);
        $fullname=$row['full_name'];
        $username=$row['username'];


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
                <td>full name:</td>
                <td><input type="text"name="full_name"value="<?php echo $fullname?>"></td>
                <td></td>
            </tr>
            <table class="tbl-30">
            <tr>
                <td>user name:</td>
                <td><input type="text"name="username"value="<?php echo $username?>"></td>
                <td></td>
            </tr> 
            <tr>
                
                <td colspqn=2> 
                    <input type="hidden"name="id"value="<?php echo $id ?>">
                    <input type="submit"name="submit"value="update admin"class="btn-secondary"></td>
            </tr>
            </table>
    </form>
    
</div>
</div>

<?php
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];

    $sql="UPDATE admin SET full_name='$full_name', username='$username' WHERE id='$id'";

    $res=mysqli_query($conn,$sql);
    if($res==TRUE){
      
       $_SESSION['update']="<div class='succes'>admin updated successfully</div>";
       header('location:'.SITEURL.'admin/manage.php');
        


    }else{
       $_SESSION['update']="<div class='error'>admin updated failed</div>";
       header('location:'.SITEURL.'admin/manage.php');

    }


}
?>

<?php
include('partials/footer.php');
?>