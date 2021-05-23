<html>
<head>
<title>Your Library | Ghannely - Music For Everyone</title>
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
    <a href="your-library.php"><div class="menu-elements selected-menu"><i class="fal fa-album-collection"></i> Your Library</div></a>
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

<div class="playlist" style="display:block">
    <h5 style="color:white;margin-top:3%;margin-bottom:2%">Your Library</h5>

<table class="table table-secondary" style="margin-top: 5%;line-height:2em">
  <thead>
    <tr>
      <th scope="col">Song Name</th>
      <th scope="col">Creator</th>
      <th scope="col">Added</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr class="table table-dark">
      <td><a href="#">W bhbk ana</a></td>
      <td><a href="#">Amr Diab</a></td>
      <td><a href="#">30-Mar-2021</a></td>
      <td><a href="#"><i class="fal fa-trash-alt"></i></a></td>
    </tr>
  </tbody>
</table>


</div>

</div>

</main>
<?php include('player.php') ?>

</div>

<?php include('scripts.php') ?>

</body>
</html>