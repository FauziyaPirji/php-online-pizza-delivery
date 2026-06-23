<?php
require_once("connect.php");
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from admin where userName='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num==1)
    {
        session_start();
        $row=mysqli_fetch_assoc($result);
        $id = $row['id'];
        $_SESSION['adminloggedin'] = true;
        $_SESSION['adminname'] = $username;
        $_SESSION['adminid'] = $id;
        header("location: /php-online-pizza-delivery/admin/admin_home.php?loginsuccess=true");
        exit();
    }
    else
    {
        header("location: /php-online-pizza-delivery/admin/admin_index.php?loginsuccess=false");    
    }
}    
?>