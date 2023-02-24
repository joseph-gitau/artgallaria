<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'partials/header_scripts.php'; ?>
    <title>ARTGALLERIA - browse</title>
</head>

<body>
    <header>
        <?php include 'partials/nav.php'; ?>
    </header>
    <!-- browse arts in gring format -->
    <div class="category display">
        <div class="header">
            <h1>Browse our art collection</h1>
        </div>
        <div class="row">
            <?php
            for ($i = 0; $i < 13; $i++) {
            ?>
                <div class="item">
                    <a href="art.php">
                        <img src="resources/images/hero_3.jpg" alt="abstract">
                        <h3>Abstract</h3>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>