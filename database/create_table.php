<?php
    require_once("connect.php");

    $admin = "CREATE TABLE IF NOT EXISTS `admin` (
        `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        `userName` varchar(21) UNIQUE KEY NOT NULL,
        `firstName` varchar(21) NOT NULL,
        `lastName` varchar(21) NOT NULL,
        `email` varchar(35) UNIQUE KEY NOT NULL,
        `phone` varchar(20) UNIQUE KEY NOT NULL,
        `password` varchar(10) UNIQUE KEY NOT NULL,
        `photo` varchar(100) NOT NULL,
        `joinDate` datetime NOT NULL
    )";

    $customer = "CREATE TABLE IF NOT EXISTS `customer` (
        `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        `userName` varchar(21) UNIQUE KEY NOT NULL,
        `firstName` varchar(21) NOT NULL,
        `lastName` varchar(21) NOT NULL,
        `email` varchar(35) UNIQUE KEY NOT NULL,
        `phone` varchar(20) UNIQUE KEY NOT NULL,
        `password` varchar(10) UNIQUE KEY NOT NULL,
        `photo` varchar(100) NOT NULL,
        `joinDate` datetime NOT NULL
    )";

    $categories = "CREATE TABLE IF NOT EXISTS `categories` (
        `categorieId` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        `categorieName` varchar(21) UNIQUE KEY NOT NULL,
        `categorieDesc` varchar(100) NOT NULL,
        `categoriePhoto` varchar(100) NOT NULL,
        `categorieCreateDate` datetime NOT NULL
    )";

    $pizza = "CREATE TABLE IF NOT EXISTS `pizza` (
        `pizzaId` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        `pizzaName` varchar(21) UNIQUE KEY NOT NULL,
        `pizzaPrice` int(11) NOT NULL,
        `pizzaDesc` text NOT NULL,
        `pizzaCategorieId` int(11) NOT NULL REFERENCES `categories` (`categorieId`),
        `pizzaPhoto` varchar(100) NOT NULL,
        `pizzaPubliceDate` datetime NOT NULL
    )";

    $feedback = "CREATE TABLE IF NOT EXISTS `feedback` (
        `feedbackId` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        `orderId` int(11) NOT NULL REFERENCES `customer` (`id`),
        `email` varchar(35) NOT NULL,
        `phoneNo` varchar(15) NOT NULL,
        `feedback` text NOT NULL,
        `time` datetime NOT NULL
    )";

    $viewCart = "CREATE TABLE IF NOT EXISTS `viewcart` (
        `cartItemId` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        `pizzaId` int(11) NOT NULL REFERENCES `pizza` (`pizzaId`),
        `itemQuantity` bigint(20) NOT NULL,
        `userId` int(11) NOT NULL REFERENCES `customer` (`id`),
        `addedDate` datetime NOT NULL
    )";

    $orders = "CREATE TABLE IF NOT EXISTS `orders` (
        `orderId` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        `userId` int(11) NOT NULL REFERENCES `customer` (`id`),
        `address` varchar(255) NOT NULL,
        `zipCode` bigint(20) NOT NULL,
        `phoneNo` varchar(15) NOT NULL,
        `amount` bigint(20) NOT NULL,
        `paymentMode` enum('0','1') NOT NULL COMMENT '0=case delivery or 1=online',
        `orderStatus` enum('0','1','2','3','4','5','6') NOT NULL COMMENT '0=Order placed, 1=Order confirmed, 2=Preparing your order, 3=Your order is on the way, 4=Order Delivered, 5=Order denied, 6=Order cancelled',
        `OrderDate` datetime NOT NULL
    )";

    $orderItems = "CREATE TABLE IF NOT EXISTS `orderitems` (
        `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        `orderId` int(11) NOT NULL REFERENCES `orders` (`orderId`),
        `pizzaId` int(11) NOT NULL REFERENCES `pizza` (`pizzaId`),
        `itemQuantity` bigint(100) NOT NULL
    )";

    $siteDetails = "CREATE TABLE IF NOT EXISTS `sitedetails` (
        `tempId` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        `systemName` varchar(21) NOT NULL,
        `email` varchar(35) NOT NULL,
        `contact1` varchar(15) NOT NULL,
        `contact2` varchar(15) NOT NULL,
        `address` varchar(255) NOT NULL,
        `dateTime` datetime NOT NULL
    )";

    if($conn->query($admin)===True && $conn->query($customer)===True && $conn->query($categories)===True && $conn->query($pizza)===True
    && $conn->query($feedback)===True && $conn->query($viewCart)===True && $conn->query($orders)===True && $conn->query($orderItems)===True
    && $conn->query($siteDetails)===True)
    {
        echo " table created successfully";
    }
    else
    {
        echo " Error creating database".$conn->error;
    }
    $conn->close();
?>