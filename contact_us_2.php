<?php
    require_once("connect.php");
    if(isset($_POST['submit']))
    {
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $orderid = $_POST["orderid"];
        $msg = $_POST["msg"];
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO `feedback` VALUES (NULL ,'$orderid','$email','$phone','$msg','$date')";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            header("Location:contact_us.php");
        }
        else
        {
            echo "Record not inserted";
        }
    }
?>