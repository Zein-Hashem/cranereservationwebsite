<?php
include('../config/connect.php');
?>
<html>
<head><title>login crane</title></head>
<link rel="stylesheet" href="../css/admin.css">
<body>
    
<div class="ok">

    <h1 class="text-center">Login</h1>
     <br><br>

     <?php
     if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
        unset($_SESSION['login']);
       }
       if(isset($_SESSION['nologin'])){
        echo $_SESSION['nologin'];
        unset($_SESSION['nologin']);
       }
     ?>
     <br><br>
    <form action=""method="POST">
        USERNAME:
        <input type="text"name="username"placeholder="enter username">
        <br><br>
        PASSWORD:
        <input type="password"name="password"placeholder="enter username">
        <br><br>

        <input type="submit"name="submit"value="login"class="btn-secondary">
 
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql="SELECT * FROM admin WHERE username='$username'AND password='$password' ";
    $res3=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res3);

    if($count==1){
        $_SESSION['login']='login successfully';
        $_SESSION['user']=$username;
        header('location:'.SITEURL.'admin/');
    }else{
        $_SESSION['login']='login failed username or password didnot match';
        header('location:'.SITEURL.'admin/login.php');

    }
}
?>