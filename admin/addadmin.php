<?php
include('partials/category.php');
?>
 <div class="main">
    <div class="wrapper">
    <h1>Add Admin</h1>
    <br><br>

    <?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
       }
    
    ?>

    <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>full name:</td>
                <td><input type="text"name="fullname"placeholder="enter your fullname"></td>
                <td></td>
            </tr>
            <tr>
                <td>username:</td>
                <td><input type="text"name="username"placeholder="enter your username"></td>
            </tr>
            <tr>
                <td>password:</td>
                <td><input type="password"name="password"placeholder="enter your password"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit"name="submit"value="Add admin"class="btn-secondary"></td>
            </tr>
        </table>
    </form>
    
</div>
</div>

 
 
 <?php
include('partials/footer.php');
?>

<?php
if(isset($_POST['submit']))
{
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql="INSERT INTO admin SET 
    full_name='$fullname',username='$username',password='$password' ";
    
    $result =mysqli_query($conn, $sql);

if ($result === TRUE) {
    
    $_SESSION['add1']="<div class='succes'>admin added successfully<?div>"; 
    header("location:".SITEURL.'admin/manage.php');


} else {
    
    $_SESSION['add1']="<div class='error'failed to add admin<?div>"; 
    header("location:".SITEURL.'admin/addadmin.php');


}


    

    
}

?>