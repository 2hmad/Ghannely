<html>
<head>
<title>Edit Your Profile | Ghannely - Music For Everyone</title>
<?php include('links.php') ?>
</head>
<body style="background: hsl(218deg 11% 15%);">

<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#"></a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-menu" style="margin-top: 10%;">
    <a href="overview.php"><div class="menu-elements"><i class="fal fa-headphones"></i> Browse</div></a>
    <a href="#"><div class="menu-elements"><i class="fal fa-podcast"></i> Podcasts</div></a>
    <div class="menu-elements" style="color: #797979;font-weight: 700;padding: 15px 17px 0px 17px;"><p>Personal</p></div>
    <a href="your-playlist.php"><div class="menu-elements"><i class="fal fa-list-music"></i> Playlist</div></a>
    <a href="your-library.php"><div class="menu-elements"><i class="fal fa-album-collection"></i> Your Library</div></a>
          <?php
          $email = $_SESSION['email'];
          $sql = "SELECT * FROM users WHERE email='$email'";
          $query = mysqli_query($connect, $sql);
          while($row = mysqli_fetch_array($query)) {
              $id = $row['id'];
          }
          ?>
          <a href="profile.php?id=<?php echo $id ?>"><div class="menu-elements"><i class="far fa-user"></i> Profile</div></a>
    <a href="logout.php"><div class="menu-elements"><i class="fal fa-power-off"></i> Logout</div></a>
      </div>
    </div>
  </nav>
<main class="page-content">
<div id="container" style="margin-bottom: 8rem">
<div class="edit-profile" style="padding:15px;display: block;margin-left: auto;margin-right: auto;background: #202429;height: 100%;width: 640px;max-width:100%;box-shadow: 0px 0px 16px 10px #212121;">
<h4 style="color:white;text-align:center;margin-top:5%;margin-bottom:5%">Edit Profile</h4>
    <?php
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($query)) {
        $name = $row['name'];
        $birthdate = $row['birthdate'];
        $bio = $row['bio'];
        if ($row['profile_pic'] !== "") {
            $profile_pic = $row['profile_pic'];
        } else {
            $profile_pic = '../pics/user.png';
        }
    }
    ?>
    <form method="POST" enctype="multipart/form-data">
    <div style="margin-bottom: 5%;">
        <?php
        $sql = "SELECT * FROM users WHERE email='$email'";
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)) {
            $name = $row['name'];
            $birthdate = $row['birthdate'];
            $bio = $row['bio'];
            if ($row['profile_pic'] !== "") {
                $profile_pic = $row['profile_pic'];
            } else {
                $profile_pic = '../pics/user.png';
            }
            if($row['profile_pic'] !== "") {
                $get_pic = $row['profile_pic'];
                echo '<img src="data:image/jpeg;base64,'.$get_pic.'" style="width:100px;height:100px;border-radius:50%" />';
            }else{
                echo '<img src="../pics/user.png" style="width:100px;height:100px;border-radius:50%">';
            }
        }
        ?>
        <input type="file" name="change-pic" style="margin-left: 5%;color:white">
    </div>
    <label style="color:white;display:block;margin-bottom:1%">Your name</label>
    <input type="text" name="change-name" value="<?php echo $name ?>" style="color:White;outline:none;width: 100%;padding: 10px;border-radius: 5px;border: 1px solid #373b42;background: transparent;">
    <label style="color:white;display:block;margin-bottom:1%;margin-top:5%">Date of birth</label>
    <input type="date" name="change-date" value="<?php echo $birthdate ?>" style="color:White;outline:none;width: 100%;padding: 10px;border-radius: 5px;border: 1px solid #373b42;background: transparent;">
    <label style="color:white;display:block;margin-bottom:1%;margin-top:5%">Bio</label>
    <textarea name="change-bio" style="color:White;outline:none;width: 100%;height:100px;padding: 10px;border-radius: 5px;border: 1px solid #373b42;background: transparent;"><?php if($bio !== ""){ echo $bio; }else{ echo ""; } ?></textarea>
    <button type="submit" name="change-profile" class="change-profile">Save Changes</button>
</form>
    <?php
    if(isset($_POST['change-profile'])){
        if($_FILES['change-pic']['tmp_name'] !== "") {
            $pic = base64_encode(file_get_contents($_FILES['change-pic']['tmp_name']));;
        }
        $name = $_POST['change-name'];
        $date = $_POST['change-date'];
        $bio = $_POST['change-bio'];
        if($_FILES['change-pic']['tmp_name'] !== ""){
            $sql = "UPDATE users SET name='$name', birthdate='$date', bio='$bio', profile_pic = '$pic' WHERE email = '$email'";
        } else {
            $sql = "UPDATE users SET name='$name', birthdate='$date', bio='$bio' WHERE email = '$email'";
        }
        $query = mysqli_query($connect, $sql);
        if($query) {
            header('Location: ' . $_SERVER['PHP_SELF']);
        }
    }
    ?>
</div>
</div>
</main>
<?php include('player.php') ?>
</div>
<?php include('scripts.php') ?>
</body>
</html>