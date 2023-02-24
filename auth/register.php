<?php
// if seession is not started, start it

if (!isset($_SESSION)) {
    session_start();
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php
    // include header_links.php
    include '../admin/header_links.php';
    ?>
    <link rel="stylesheet" type="text/css" href="style.css?v<?php echo rand(); ?>">

    <title>ARTGALLERIA - register</title>
    <script src="../js/index.js?v<?php echo rand(); ?>"></script>


</head>

<body>
    <div class="container" id="container">
        <div class="header">
            <h2>ARTGALLERIA - register</h2>
        </div>

        <form method="post" action="../reg_exe.php" id="register_form">
            <div class="input-group">
                <label>Full name</label>
                <input type="text" name="name" id="name" value="">
            </div>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" id="username" value="">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" id="email" value="">
            </div>
            <div class="input-group">
                <label>Phone</label>
                <input type="text" name="phone" id="phone" value="">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1" id="password_1">
            </div>
            <div class="input-group">
                <label>Confirm password</label>
                <input type="password" name="password_2" id="password_2">
            </div>
            <!-- role -->
            <!-- <div class="input-group">
                <label>Role</label>
                <select name="role" class="chosen-select" id="role">
                    <option value="jobseeker">Jobseeker</option>
                    <option value="employer">Employer</option>
                </select>
            </div> -->
            <div class="input-group">
                <button type="submit" class="btn register_user" id="register_user" name="register_user">Register</button>
            </div>
            <p>
                Already have an account? <a href="login.php">Sign in</a>
            </p>
        </form>
    </div>

    <?php
    // include footer_scripts.php
    // include '../js/index.js';
    ?>
</body>

</html>