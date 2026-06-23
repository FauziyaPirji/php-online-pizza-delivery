<?php
    require_once("connect.php");
    if(isset($_POST['submit']))
    {
        $cname = $_POST["cname"];
        $details = $_POST["details"];
        $image = $_FILES["image"]['tmp_name'];
        $filename = $_FILES['image']['name'];
        $date = date("Y-m-d H:i:s");
        move_uploaded_file($image,"Images/" .$filename);
        $sql = "INSERT INTO `categories` VALUES (NULL ,'$cname','$details','$filename','$date')";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            header("Location:admin_category_list.php");
        }
        else
        {
            echo "Record not inserted".$conn->error;
        }
    }
?>