<?php
require_once("connect.php");
if(isset($_POST['submit'])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "select * from customer where userName='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num==1)
    {
        session_start();
        $row=mysqli_fetch_assoc($result);
        $id = $row['id'];
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id;
        header("location: /php-online-pizza-delivery/home.php?loginsuccess=true");
        exit();
    } 
    else{
        header("location: /php-online-pizza-delivery/index.php?loginsuccess=false");
    }
}    
?>