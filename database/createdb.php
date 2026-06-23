<?php
    require_once("connect.php");
    $sql="CREATE DATABASE IF NOT EXISTS pizzaHouse";
    if($conn->query($sql)===True)
    {
        echo "  Database created successfully";
    }
    else
    {
        echo "  Error creating database".$conn->error;
    }
    $conn->close();
?>