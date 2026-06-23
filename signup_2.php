<?php
    require_once("connect.php");
    if(isset($_POST['submit']))
    {
        $username = $_POST["username"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $image = $_FILES["image"]['tmp_name'];
        $filename = $_FILES['image']['name'];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $date = date("Y-m-d H:i:s");
        move_uploaded_file($image,"Images\ $filename");
        $sql = "INSERT INTO `customer` VALUES (NULL ,'$username','$firstName','$lastName','$email','$phone','$password','$filename', '$date')";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            header("Location:index.php");
        }
        else
        {
            echo "Record not inserted";
        }
    }
?>