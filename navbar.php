<nav class="navbar navbar-expand-lg navbar-dark" style="padding: 15px;font-size: 18px;background:#fff;-webkit-box-shadow: 0 3px 14px 0px rgb(0 0 0 / 6%);box-shadow: 0 3px 14px 0px rgb(0 0 0 / 6%);">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php" style="color: black !important;"><img src="pics/Logo-01.png" class="logo" style="max-width: 200px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div>
        <?php
        include('connection.php');
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $sql = "SELECT * FROM users WHERE email='$email'";
            $query = mysqli_query($connect, $sql);
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_array($query)){
                    $profile_pic = $row['profile_pic'];
                    if($profile_pic !== "") {
                        echo "<a href='account/overview.php'><img src='data:image/jpeg;base64,".$profile_pic."' style='max-width:50px;height:50px;object-fit:cover;border-radius:50%'></a>";
                    } else {
                        echo "<a href='account/overview.php'><img src='pics/user.png' style='max-width: 50px;height: 50px;object-fit: cover;border-radius:50%'></a>";
                    }
                }
            }
        } else {
            echo '<div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a href="home.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
            <a href="premium.php" class="nav-link">Premium</a>
        </li>
        <li class="nav-item">
            <a href="login.php" class="nav-link">Login</a>
        </li>
        <li class="nav-item">
            <a href="signup.php" class="nav-link">Register</a>
        </li>
      </ul>
    </div>';
        }
        ?>

    </div>
  </div>
</nav>
