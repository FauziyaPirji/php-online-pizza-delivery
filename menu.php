<!DOCTYPE html>
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
        <!-- Category container starts here -->
        <div class="container my-3 mb-5">
            <div class="col-lg-2 text-center my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">     
                <h2 class="text-center">Menu </h2>
            </div>
            <div class="row">
            <!-- Fetch all the categories and use a loop to iterate through categories -->
            <?php 
                require_once("connect.php");
                $sql = "SELECT * FROM `categories`"; 
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    $id = $row['categorieId'];
                    $cat = $row['categorieName'];
                    $desc = $row['categorieDesc'];
                    $categoriePhoto = $row['categoriePhoto'];
                    echo '<div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="card" style="width: 18rem;">
                                <img src="admin/Images/' .$categoriePhoto. '" class="card-img-top" alt="image for this category" width="249px" height="270px">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="viewPizzaList.php?catid=' . $id . '">' . $cat . '</a></h5>
                                    <p class="card-text text-dark">' . substr($desc, 0, 30). '... </p>
                                    <a href="viewPizzaList.php?catid=' . $id . '" class="btn btn-primary">View All</a>
                                </div>
                            </div>
                        </div>';
                }
            ?>
            </div>
        </div>
        <?php require '_footer.php' ?>
    </body>
</html>
