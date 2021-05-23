<html>
<head>
<title>My Profile | Ghannely - Music For Everyone</title>
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
          <a href="profile.php?id=<?php echo $id ?>"><div class="menu-elements selected-menu"><i class="far fa-user"></i> Profile</div></a>
          <a href="logout.php"><div class="menu-elements"><i class="fal fa-power-off"></i> Logout</div></a>
      </div>
    </div>
  </nav>
<main class="page-content">
<div id="container" style="margin-bottom: 8rem">
<div class="profile" style="display:block">
    
<div class="row">
    <div class="col-lg-2">
        <?php
        $email = $_SESSION['email'];
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id='$id'";
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)){
            $name = $row['name'];
            if($row['profile_pic'] !== "") {
                $profile_pic = $row['profile_pic'];
            } else {
                $profile_pic = '../pics/user.png';
            }
            if($row['profile_pic'] !== "") {
                $get_pic = $row['profile_pic'];
                echo '<img src="data:image/jpeg;base64,'.$get_pic.'" style="width: 200px;height: 200px;max-width: 100%;border-radius: 50%;object-fit: cover" />';
            }else{
                echo '<img src="../pics/user.png" style="width: 200px;height: 200px;max-width: 100%;border-radius: 50%;object-fit: cover">';
            }
            echo "<h1 style='color: white;font-size: 1.5rem;text-align: center;margin-top: 5%;margin-bottom:5%;display:block'>$name</h1>";
        }
        ?>
        <button type="button" style="display: block;
        background: transparent;
        border: none;
        outline: none;
        color: white;
        font-size: 15px;
        margin-left: auto;
        margin-right: auto;" class="share">SHARE <i class="fal fa-share-alt"></i></button>
        <?php
        $id = $_GET['id'];
        $sql_validate = "SELECT * FROM users WHERE id = '$id'";
        $query_validate = mysqli_query($connect, $sql_validate);
        while($row_validate = mysqli_fetch_array($query_validate)){
            $email = $row_validate['email'];
            if($email === $_SESSION['email']) {
                echo '<a href="edit-profile.php"><button style="display: block;
        background: #515356;
        color: white;
        width: 100%;
        margin-top: 10%;
        padding: 10px;
        border: 1px solid #515356;
        border-radius: 50px;
        text-transform: capitalize;
        outline:none"><i class="fal fa-pen"></i> Edit Your profile</button></a>';
            } else {
                echo "";
            }
        }
        ?>

    </div>
    <div class="col-lg">
        <div style="margin-left: 5%;">
        <h3 style="color: white;margin-bottom:3%;margin-top:3%">Followed Artists</h3>
        <div class="col-lg-2">
            <a href="#">
            <img src="../pics/ab67706f0000000231f2c47e13ecd7857a489d79.jpg" style="display:block;width:221px;height:221px;border-radius:50%">
            <span style="text-align: center;color:white;display:block;margin-top:5%;font-weight:bold">Wegz</span>
            </a>
        </div>
        </div>
    </div>
</div>
    
</div>
</div>
</main>
<?php include('player.php') ?>
</div>
<?php include('scripts.php') ?>
<script>
    var $temp = $("<input>");
    var $url = $(location).attr('href');
    $('.share').on('click', function() {
        $("body").append($temp);
        $temp.val($url).select();
        document.execCommand("copy");
        $temp.remove();
        alert('Url Copied');
    })
</script>
</body>
</html>