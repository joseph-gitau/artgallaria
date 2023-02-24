<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user_id']) && !isset($_SESSION['username'])) {
    $_SESSION['referer_page'] = $_SERVER['REQUEST_URI'];
    header("Location: ../auth/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header_links.php'; ?>
    <title>ARTGALLERIA - Admin dashboard</title>
</head>

<body>
    <header>
        <?php include 'nav.php'; ?>
    </header>

    <?php
    echo $_SESSION['username'];
    echo $_SESSION['user_id'];
    ?>
    hello world
</body>

</html>