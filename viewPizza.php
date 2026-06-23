<!doctype html>
<html lang="en">
<head>
        <title>Menu</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="Images/logo.jpg" type = "image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
<body>
    <?php include 'navbar.php';?>
    <div class="container my-4 text-dark" id="cont">
        <div class="row jumbotron">
        <?php
            require_once("connect.php");
            $pizzaId = $_GET['pizzaid'];
            $sql = "SELECT * FROM `pizza` WHERE pizzaId = $pizzaId";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $pizzaName = $row['pizzaName'];
            $pizzaPrice = $row['pizzaPrice'];
            $pizzaDesc = $row['pizzaDesc'];
            $pizzaCategorieId = $row['pizzaCategorieId'];
            $pizzaPhoto = $row['pizzaPhoto'];
        ?>
        <script> document.getElementById("title").innerHTML = "<?php echo $pizzaName; ?>"; </script> 
        <?php
        echo  '<div class="col-md-4">
                <img src="admin/Images/' . $pizzaPhoto . '" width="249px" height="262px">
            </div> 
            <div class="col-md-8 my-4">
                <h3>' . $pizzaName . '</h3>
                <h5 style="color: #ff0000">Rs. '.$pizzaPrice. '/-</h5>
                <p class="mb-0">' .$pizzaDesc .'</p>
                <a href="cart.php"><button class="btn btn-primary my-2">Go to Cart</button></a>';
                echo '</form>
                <h6 class="my-1"> View </h6>
                <div class="mx-4">
                    <a href="viewPizzaList.php?catid=' . $pizzaCategorieId . '" class="active text-dark">
                    <i class="fas fa-qrcode"></i>
                        <span>All Pizza</span>
                    </a>
                </div>
                <div class="mx-4">
                    <a href="menu.php" class="active text-dark">
                    <i class="fas fa-qrcode"></i>
                        <span>All Category</span>
                    </a>
                </div>
            </div>'
        ?>
        </div>
    </div>
    <?php require '_footer.php' ?>
    </body>
</html>