<html lang="en">
<head>
    <title>Create an account - Ghannely</title>
    <?php include('links.php') ?>
    <style>
        input[type="text"], input[type="email"], input[type="password"], select, input[type="date"] {
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

<div class="signup-page" style="margin-top: 5%;">
    <h4 style="text-align:center;">Sign up to start creating your library.</h4>
    <p style="text-align:center;color:#a7a7a7">For Free</p>
    <button class="signup-with-facebook">Sign Up with facebook</button>
    <span class="or">OR</span>
    <form method="POST">
        <input type="text" name="name-signup" placeholder="What's Your Name ?">
        <input type="email" name="email-signup" placeholder="What's Your Email ?">
        <input type="password" name="password-signup" placeholder="Password" id="input-password" style="margin-bottom: 0%">
        <div class="meter-text" id="meter-text" style="margin-bottom: 5%">
        <span>password strength : </span>
            <span class="meter-status" id="meter-status"></span>
        </div>
        <select name="gender">
            <option value="" hidden>Gender</option>
            <option>Male</option>
            <option>Female</option>
        </select>
        <input placeholder="Birthdate" type="text" name="birthdate-signup" onfocus="(this.type='date')" onblur="(this.type='text')">
        <div class="agree-signup" style="display:block">
            <input type="checkbox" name="agree-share" id="agree-share" value="agree">
            <label for="agree-share" style="display:inline">Share my registration data with Ghannely's content providers for marketing purposes.</label>
        </div>
        <span style="display: block;text-align:center;font-size: 12px;margin-top:10%;margin-bottom:1%">By clicking on Sign up, you agree to Ghannely's <a href="#" style="text-decoration: underline!important;color:black!important">Terms and Conditions</a> of Use.</span>
        <span style="display: block;text-align:center;font-size: 12px;">To learn more about how Ghannely collects, uses, shares and protects your personal data please read Ghannely's <a href="#" style="text-decoration: underline!important;color:black!important">Privacy Policy</a>.</span>
        <input type="submit" name="signup" value="Sign Up" class="signup">
    </form>
    <?php
        include ('connection.php');
        if(isset($_POST['signup'])) {
            $name = $_POST['name-signup'];
            $email = $_POST['email-signup'];
            $password = sha1($_POST['password-signup']);
            $gender = $_POST['gender'];
            $birthdate = $_POST['birthdate-signup'];
            $visibility = "1";
            if(isset($_POST['agree-share'])) {
                $agree_share = $_POST['agree-share'];
            } else {
                $agree_share = "no";
            }
            if($name !== "" && $email !== "" && $password !== "" && $gender !== "" && $birthdate !== "") {
                $sql_validate = "SELECT * FROM users WHERE email='$email'";
                $query_validate = mysqli_query($connect, $sql_validate);
                $num_validate = mysqli_num_rows($query_validate);
                if($num_validate > 0) {
                    echo "<div class='alert alert-danger' style='margin-top: 3%'>Sorry! You previously registered with this email address</div>";
                } else {
                    $sql = "INSERT INTO users (name, email, password, gender, birthdate, visibility, agree_share) VALUES ('$name', '$email', '$password', '$gender', '$birthdate', '$visibility', '$agree_share')";
                    $query = mysqli_query($connect, $sql);
                    echo "<div class='alert alert-success' style='margin-top: 3%'>Great! You will be redirected to the login page in 5 seconds</div>";
                    header( "refresh:5;url=login.php" );
                }
            }
        }
    ?>
</div>

<?php include('footer.php') ?>
</body>
<?php include('scripts.php') ?>
</html>