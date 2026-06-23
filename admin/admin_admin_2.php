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
        move_uploaded_file($image,"Images/" .$filename);
        $sql = "INSERT INTO `admin` VALUES (NULL ,'$username','$firstName','$lastName','$email','$phone','$password','$filename', '$date')";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            header("Location:admin_admin.php");
        }
        else
        {
            echo "Record not inserted";
        }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['removeUser'])) {
            $Id = $_POST["Id"];
            $sql = "DELETE FROM `admin` WHERE `id`='$Id'";   
            $result = mysqli_query($conn, $sql);
            echo "<script>alert('Removed');
                window.location=document.referrer;
                </script>";
        }
        if(isset($_POST['editUser'])) {
            $id = $_POST["userId"];
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $userType = $_POST["userType"];
    
            $sql = "UPDATE `admin` SET `firstName`='$firstName', `lastName`='$lastName', `email`='$email', `phone`='$phone' WHERE `id`='$id'";   
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>alert('update successfully');
                    window.location=document.referrer;
                    </script>";
            }
            else {
                echo "<script>alert('failed');
                    window.location=document.referrer;
                    </script>";
            }
        }
    }
?>