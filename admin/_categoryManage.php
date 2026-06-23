<?php
    include 'connect.php';
    if(isset($_POST['removeCategory'])) {
        $catId = $_POST["catId"];
        $sql = "DELETE FROM `categories` WHERE `categorieId`='$catId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('Removed');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateCategory'])) {
        $catId = $_POST["catId"];
        $catName = $_POST["name"];
        $catDesc = $_POST["desc"];

        $sql = "UPDATE `categories` SET `categorieName`='$catName', `categorieDesc`='$catDesc' WHERE `categorieId`='$catId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('update');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }
?>