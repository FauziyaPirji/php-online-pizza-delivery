<?php
    require_once("connect.php");
    if(isset($_POST['submit']))
    {
        $name = $_POST["name"];
        $desc = $_POST["description"];
        $price = $_POST["price"];
        $categoryId = $_POST["categoryId"];
        $image = $_FILES["image"]['tmp_name'];
        $filename = $_FILES['image']['name'];
        $date = date("Y-m-d H:i:s");
        move_uploaded_file($image,"Images/" .$filename);
        $sql = "INSERT INTO `pizza` VALUES (NULL ,'$name','$price','$desc','$categoryId','$filename', '$date')";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            header("Location:admin_menu.php");
        }
        else
        {
            echo "Record not inserted";
        }
    }
?>