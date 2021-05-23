<html>
<head>
<title>Your Playlist | Ghannely - Music For Everyone</title>
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
    <a href="your-playlist.php"><div class="menu-elements selected-menu"><i class="fal fa-list-music"></i> Playlist</div></a>
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

<div class="playlist" style="display:block">
    <h5 style="color:white;margin-top:3%;margin-bottom:2%">Your Playlists</h5>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="fal fa-list-music"></i> Create Playlist
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Your Playlist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <input type="text" name="playlist-name" placeholder="Playlist name" style="width: 100%;display: block;padding: 8px;border-radius: 5px;outline: none;border: 1px solid #CCC;margin-bottom: 3%;">
          <input type="text" name="category" placeholder="Playlist Category" style="width: 100%;display: block;padding: 8px;border-radius: 5px;outline: none;border: 1px solid #CCC;margin-bottom: 3%;"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="save-playlist" class="btn btn-primary">Save playlist</button>
      </div>
      </form>
        <?php
        if(isset($_POST['save-playlist'])) {
            $email = $_SESSION['email'];
            $playlist_name = $_POST['playlist-name'];
            $playlist_category = $_POST['category'];
            $created_date = date("d-M-Y");
            $sql = "INSERT INTO playlists (email, playlist_name, playlist_category, date) VALUES ('$email', '$playlist_name', '$playlist_category', '$created_date')";
            $query = mysqli_query($connect, $sql);
            header('Location: your-playlist.php');
        }
        ?>
    </div>
  </div>
</div>

<table class="table table-secondary" style="margin-top: 5%;line-height:2em">
  <thead>
    <tr>
      <th scope="col">Playlist name</th>
      <th scope="col">Created date</th>
      <th scope="col">Number of Ghannely</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table table-dark">
        <?php
        $sql = "SELECT * FROM playlists WHERE email = '$email'";
        $query = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($query);
        if($num > 0) {
            while ($row = mysqli_fetch_array($query)){
                $id = $row['id'];
                $playlist_name = $row['playlist_name'];
                $playlist_category = $row['playlist_category'];
                $date = $row['date'];
                $sql_count = "SELECT count(*) AS playlist_count FROM playlists_container WHERE creator = '$email' AND playlist_id ='$id'";
                $query_count = mysqli_query($connect, $sql_count);
                $data_count=mysqli_fetch_assoc($query_count);
                $count = $data_count['playlist_count'];
                echo "<td><a href='show-playlist.php?id=$id'>$playlist_name</a></td><td><a href='show-playlist.php?id=$id'>$date</a></td><td><a href='show-playlist.php?id=$id'>$count</a></td>";
            }
        }

        ?>
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