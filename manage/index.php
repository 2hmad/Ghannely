<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard | Ghannely</title>
    <?php include('links.php') ?>
</head>
<body style="background: #4690dd">

<div style="padding: 20px;text-align: center;margin-left: auto;margin-right: auto;display: block;">
	<form method="POST" style="margin-left: auto;margin-right: auto;position: relative;top: 210px;text-align: center">
        <img src="../pics/logo-01.png" style="max-width: 210px;margin-bottom: 2%;">
        <label style="color:white;display: block;margin-bottom:0.5%">Email Address</label>
		<input type="email" name="admin-email" style="outline:none;margin-left:auto;margin-right:auto;display: block;padding: 10px;width: 300px;border-radius: 5px;border: none;margin-bottom: 1%;">
        <label style="color:white;display: block;margin-bottom:0.5%">Password</label>
        <input type="password" name="admin-password" style="outline:none;margin-left:auto;margin-right:auto;display: block;padding: 10px;width: 300px;border-radius: 5px;border: none;margin-bottom: 1%;">
		<input type="submit" name="login" value="Login" style="margin-left:auto;margin-right:auto;width: 150px;padding: 10px;border-radius: 5px;border: 1px solid #FFF;background: transparent;color: white;font-weight: bold;outline: none;display: block;">
        <?php
        include ('connection.php');
        if(isset($_POST['login'])){
            $email = $_POST['admin-email'];
            $pass = sha1($_POST['admin-password']);
            if($email !== "" && $pass !== ""){
                $sql = "SELECT * FROM admins WHERE email='$email' AND password='$pass'";
                $query = mysqli_query($connect, $sql);
                if(mysqli_num_rows($query) > 0){
                    header('Location: dashboard.php');
                    $_SESSION['email'] = $email;
                } else {
                    echo "<div class='alert alert-danger' style='margin-top: 1%;max-width: 500px;margin-left: auto;margin-right: auto;'>Email/Password is incorrect, Please try again</div>";
                }
            }
        }
        ?>
    </form>
</div>
</body>
<?php include('scripts.php') ?>
</html>