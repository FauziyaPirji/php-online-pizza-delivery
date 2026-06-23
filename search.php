<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="Images/logo.jpg" type = "image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php require_once("connect.php"); ?>
        <?php require 'navbar.php' ?>
        <div class="container my-3 text-dark">
        <h2 class="py-2 text-light">Search Result for <em>"<?php echo $_GET['search']?>"</em> :</h2>
        <h3><span id="cat" class="py-2 text-light"></span></h3>
        <div class="row">
        <?php 
            $noResult = true;
            $query = $_GET["search"];
            $sql = "SELECT * FROM `categories` WHERE categorieName LIKE '%$query%' OR categorieDesc LIKE '%$query%'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <script> document.getElementById("cat").innerHTML = "Category: ";</script> 
                <?php 
                $noResult = false;
                $catId = $row['categorieId'];
                $catname = $row['categorieName'];
                $catdesc = $row['categorieDesc'];
                $photo = $row['categoriePhoto'];
                echo '<div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="admin/Images/ ' .$photo. '" class="card-img-top" alt="image for this pizza" width="249px" height="270px">
                        <div class="card-body">
                            <h5 class="card-title"><a href="viewPizzaList.php?catid=' . $catId . '">' . $catname . '</a></h5>
                            <p class="card-text">' . substr($catdesc, 0, 29). '...</p>
                            <a href="viewPizzaList.php?catid=' . $catId . '" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                </div>';
            }
        ?>
        </div>
    </div>
    <?php
            if($noResult) {
                echo '<div class="jumbotron jumbotron-fluid text-dark">
                    <div class="container">
                        <h1>Your search - <em>"' .$_GET['search']. '"</em> - No Result Found.</h1>
                        <p class="lead"> Suggestions: <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li></ul>
                        </p>
                    </div>
                </div> ';
            }
        ?>
        </div>
    </div>
    <?php require '_footer.php' ?>
    </body>
</html>
