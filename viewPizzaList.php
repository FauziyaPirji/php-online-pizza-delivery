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
    <?php require 'navbar.php' ?>
    <div>&nbsp;<a href="menu.php" class="active text-light"><i class="fas fa-qrcode"></i><span>All Category</span></a></div>
    <?php
        require_once("connect.php");
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE categorieId = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['categorieName'];
            $catdesc = $row['categorieDesc'];
        }
    ?>
    <!-- Pizza container starts here -->
    <div class="container my-3" id="cont">
        <div class="col-lg-4 text-center my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">     
            <h2 class="text-center"><span id="catTitle">Items</span></h2>
        </div>
        <div class="row text-dark">
        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `pizza` WHERE pizzaCategorieId = $id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $pizzaId = $row['pizzaId'];
                $pizzaName = $row['pizzaName'];
                $pizzaPrice = $row['pizzaPrice'];
                $pizzaDesc = $row['pizzaDesc'];
                $pizzaPhoto = $row['pizzaPhoto'];
                echo '<div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="admin/Images/' .$pizzaPhoto. '" class="card-img-top" alt="image for this pizza" width="249px" height="270px">
                            <div class="card-body">
                                <h5 class="card-title">' . substr($pizzaName, 0, 20). '...</h5>
                                <h6 style="color: #ff0000">Rs. '.$pizzaPrice. '/-</h6>
                                <p class="card-text">' . substr($pizzaDesc, 0, 29). '...</p>   
                                <div class="row justify-content-center">';
                                if($loggedin){
                                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE pizzaId = '$pizzaId' AND `userId`='id'";
                                        $quaresult = mysqli_query($conn, $quaSql);
                                        $quaExistRows = mysqli_num_rows($quaresult);
                                        if($quaExistRows == 0) {
                                            echo '<form action="manageCart.php" method="POST">
                                                <input type="hidden" name="itemId" value="'.$pizzaId. '">
                                                <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>';
                                        }else {
                                            echo '<a href="cart.php"><button class="btn btn-primary mx-2">Go to Cart</button></a>';
                                        }
                                }           
                        echo '</form>                            
                                <a href="viewPizza.php?pizzaid=' . $pizzaId . '" class="mx-2"><button class="btn btn-primary">Quick View</button></a> 
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            if($noResult) {
                echo '<div class="jumbotron jumbotron-fluid text-dark">
                        <div class="container">
                            <p class="display-4">Sorry In this category No items available.</p>
                            <p class="lead"> We will update Soon.</p>
                        </div>
                    </div> ';
            }
            ?>
        </div>
    </div>
    <?php require '_footer.php' ?>
    <script> 
        document.getElementById("title").innerHTML = "<?php echo $catname; ?>"; 
        document.getElementById("catTitle").innerHTML = "<?php echo $catname; ?>"; 
    </script> 
</body>
</html>