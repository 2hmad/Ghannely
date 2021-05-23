<html>
<head>
<title>Explore New | Ghannely - Music For Everyone</title>
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
<?php include('search.php') ?>

<div class="explore-new" style="display:block">
    <a href="#"><h5 style="color:white;margin-top:3%;margin-bottom:2%">Explore New</h5></a>
    <a href="#">
        <div class="card-music">
            <div class="card-music-img"><img src="../pics/ab67706f0000000231f2c47e13ecd7857a489d79.jpg" alt="" style="width:100%"></div>
            <div class="card-music-name"><h1>hot hits Egypt</h1></div>
            <div class="card-music-text"><p>The hottest tracks in Egypt. Cover: Justin Bieber</p></div>
        </div>
    </a> 
</div>

</div>
</main>
<?php include('player.php') ?>

</div>

<?php include('scripts.php') ?>

</body>
</html>