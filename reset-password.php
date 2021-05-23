<html lang="en">
<head>
    <title>Reset Your Password - Ghannely</title>
    <?php include('links.php') ?>
    <style>
        input[type="email"] {
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

<div class="signup-page" style="margin-top: 10%;min-height:40vh">
    <h4 style="text-align:center;margin-bottom:5%">Reset Your Password</h4>
    <p style="text-align:center;color:#a7a7a7">You will receive a password reset link in your email</p>
    <form method="POST">
        <input type="email" name="email-reset" placeholder="Email Address">
        <input type="submit" value="Reset Password" class="reset">
    </form>
</div>

<?php include('footer.php') ?>
</body>
<?php include('scripts.php') ?>
</html>