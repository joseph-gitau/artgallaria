<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'partials/header_scripts.php'; ?>
    <title>ARTGALLERIA</title>
</head>

<body>
    <div class="main-view">
        <!-- nav with site's title, galary, about, register, login -->
        <?php include 'partials/nav.php'; ?>

        <!-- hero with search -->
        <div class="hero">
            <div class="hero-content">
                <h1>ARTGALLERIA</h1>
                <p>Search for your favorite art</p>
                <form action="search.php" method="GET">
                    <div class="input-field">
                        <input type="text" name="search" id="search" placeholder="Search for art">
                        <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- nw -->
    <!-- categories -->
    <div class="category">
        <h2>Categories</h2>
        <div class="row">
            <?php
            include 'dbh.php';
            $sql = "SELECT * FROM types";
            $result = mysqli_query($conn, $sql);
            $tot = mysqli_num_rows($result);
            if ($tot > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $cat_id = $row['id'];
                    $cat_name = $row['t_name'];
                    $cat_image = $row['image'];
                    if ($cat_image == "") {
                        $cat_image = "resources/images/hero_3.jpg";
                    }
                    echo "<div class='item'>
                            <a href='search.php?search=$cat_name'>
                                <img src='$cat_image' alt='$cat_name'>
                                <h3>$cat_name</h3>
                            </a>
                        </div>
                    ";
                }
            } else {
                echo "<h3>No categories found</h3>";
            }
            ?>
            <!-- <div class="item">
                <a href="search.php?search=abstract">
                    <img src="resources/images/hero_3.jpg" alt="abstract">
                    <h3>Abstract</h3>
                </a>
            </div> -->
        </div>
    </div>
    <!-- nw -->
    <!-- new art -->
    <div class="category new-art">
        <h2>New Art</h2>
        <div class="row">
            <?php
            include 'dbh.php';
            $sql = "SELECT * FROM art ORDER BY a_id DESC LIMIT 3";
            $result = mysqli_query($conn, $sql);
            $tot = mysqli_num_rows($result);
            if ($tot > 0) {
                while ($row1 = mysqli_fetch_assoc($result)) {
                    $art_id = $row1['a_id'];
                    $art_name = $row1['a_title'];
                    $art_type = $row1['a_category'];
                    $art_description = $row1['a_description'];
                    $art_image = $row1['a_image'];
                    if ($art_image == "") {
                        $art_image = "resources/images/hero_3.jpg";
                    }
                    echo "<div class='item'>
                            <a href='art.php?art_id=$art_id'>
                                <img src='resources/art/$art_image' alt='$art_name'>
                                <h3>$art_name</h3>
                                <h4>$art_type</h4>
                            </a>
                        </div>
                    ";
                }
            } else {
                echo "<h3>No art found</h3>";
            }
            ?>
            <!-- <div class="item">
                <a href="art.php">
                    <img src="resources/images/hero_3.jpg" alt="abstract">
                    <h3>Abstract</h3>
                </a>
            </div> -->

        </div>
    </div>
</body>

</html>