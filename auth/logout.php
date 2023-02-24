<?php
// if seession is not started, start it
if (!isset($_SESSION)) {
    session_start();
}
// log user out by unsetting session variables
session_destroy();
unset($_SESSION['username']);
unset($_SESSION['user_id']);
unset($_SESSION['success']);
// redirect to login page
header("location: login.php");
