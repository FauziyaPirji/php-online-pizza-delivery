<?php
    //create database connection
    $conn=mysqli_connect("localhost","root","","pizzaHouse");
    if(empty($conn))
    {
        die("Connection failed".mysqli_connect_error());
    }
    else
    {
        echo"Connection successfully";
    }
?>