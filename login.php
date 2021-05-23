<html lang="en">
<head>
    <title>Login - Ghannely</title>
    <?php include('links.php') ?>
    <style>
        input[type="email"], input[type="password"] {
            padding: 15px;
            width: 100%;
            border: 1px solid #CCC;
            border-radius: 5px;
            outline: none;
            display: block;
            margin-bottom: 5%;
        }
        
    </style>
</head>
<body>
<?php include('navbar.php') ?>

<div class="login-page" style="margin-top: 5%;">
    <h4 style="text-align:center;">To continue, log in to Ghannely.</h4>
    <p style="text-align:center;color:#a7a7a7">Anytime, Anywhere.</p>
    <button class="login-with-facebook"><i class="fab fa-facebook-f"></i> Sign In with facebook</button>
    <button class="login-with-google"><i class="fab fa-google"></i> Sign In with Google</button>
    <span class="or">OR</span>
    <form method="POST">
        <input type="email" name="email-login" placeholder="Email Address">
        <input type="password" name="password-login" placeholder="Password">
        <a href="reset-password.php" style="color: black !important;text-decoration: underline !important;">Forget Your Password ?</a>
        <input type="submit" name="login" value="Login" class="login">
    </form>
    <?php
    include ('connection.php');
    if(isset($_POST['login'])) {
        $email = $_POST['email-login'];
        $password = sha1($_POST['password-login']);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $query = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($query);
        if($num > 0) {
            $_SESSION['email'] = $email;
            header('Location: account/overview.php');
        } else {
            echo "<div class='alert alert-danger' style='margin-top: 3%'>No! Please enter correct information</div>";
        }
    }
    if(isset($_SESSION['email'])) {
        header('Location: account/overview.php');
    }
    ob_end_flush();
    ?>
</div>

<?php include('footer.php') ?>
</body>
<?php include('scripts.php') ?>
</html>