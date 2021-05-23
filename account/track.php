<html>
<head>
<title>Hot Hits Egypt | Ghannely - Music For Everyone</title>
<?php include('links.php') ?>
<style>
.dropdown-toggle::after {
    border-top: none;
    border-right: none;
    border-bottom: none;
    border-left: none;
}
</style>
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

<div class="explore-new" style="display:block">
    <div class="row">
    <div class="col-lg-2">
        <img src="../pics/ab67706f0000000231f2c47e13ecd7857a489d79.jpg" style="width:100%;border-radius:5px">
        <h3 style="color:white;margin-top:5%">Hot Hits Egypt</h3>
        <img src="../pics/user.png" style="width:40px;height:40px;border-radius:50%">
        <a href="#" style="font-size: 13px;margin-left:auto">Wegz</a>
        <div class="music-info" style="color: #CCC;margin-top:5%;text-transform: uppercase">
        
            <span><?php echo date('M', strtotime("March" . '01')); ?> 2021 | </span>

            <span><?php function number_format_short($n) {
        $n = (0+str_replace(",", "", $n));
        if (!is_numeric($n)) return false;
        if ($n > 1000000000000) return round(($n/1000000000000), 2).'T';
        elseif ($n > 1000000000) return round(($n/1000000000), 2).'B';
        elseif ($n > 1000000) return round(($n/1000000), 2).'M';
        elseif ($n >= 1000) return round(($n/1000), 2).'K';
        return number_format($n);
    }echo number_format_short('100');?> Likes</span>
        </div>
    <form method="POST" style="margin-top: 5%;">
        <button type="submit" name="play-song" class="play-song">Play</button>
        <button type="submit" name="like-song" class="like-song">Like</button>
    </form>
     
    </div>
    <div class="col-lg" style="padding: 10px;margin-left: 5%;">
    <section style="margin-top: 1%;">
        <h4 style="color:white;font-weight:500">Popular Ghannely by Wegz</h4>
        <div class="popular-artist-tracks">
            <div style="padding: 10px;color:white;display:inline-block;margin-right:1%">
                <img src="../pics/ab67706f0000000231f2c47e13ecd7857a489d79.jpg" style="margin-bottom:1%;width: 215px;height:215px">
                <h5 style="display:block;font-weight:bold">دورك جاي</h5>
                <span style="color:#797979">Wegz</span>
            </div>
            <div style="padding: 10px;color:white;display:inline-block;margin-right:1%">
                <img src="../pics/ab67706f0000000231f2c47e13ecd7857a489d79.jpg" style="margin-bottom:1%;width: 215px;height:215px">
                <h5 style="display:block;font-weight:bold">دورك جاي</h5>
                <span style="color:#797979">Wegz</span>
            </div>
        </div>
    </section>
    <section style="margin-top: 5%;">
        <h4 style="color:white;font-weight:500">Recommended Ghannely</h4>
        <div class="recommended-tracks" style="margin-top: 3%;">
        <div class="table-responsive">
        <table class="table" style="color:white;vertical-align: middle;border:#353535">
            <tbody>
                <tr>
                    <td>
                    <img src="../pics/ab67706f0000000231f2c47e13ecd7857a489d79.jpg" style="margin-right:3%;max-width:70px;height:70px;object-fit:cover;">
                    <a href="#" style="margin-right: 3%;font-size: 20px;"><i class="fal fa-thumbs-up"></i></a>
                    <a href="#" style="font-size: 20px;"><i class="fal fa-user-music"></i></a>
                    </td>
                    <td><a href="#">بستك نو</a></td>
                    <td><a href="#">شاهين وسامر</a></td>
                    <td><a href="#">بستك نو</a></td>
                    <td>
                    <div class="dropdown"><a class="btn dropdown-toggle" style="box-shadow: none;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fal fa-ellipsis-h-alt"></i></a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink" style="line-height: 2em;">
                        <li><a class="dropdown-item" href="#"><i class="fal fa-play"></i> Play</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fal fa-share-alt"></i> Share</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fal fa-user-music"></i> Go to artist</a></li>
                    </ul>
                    </div>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        </div>
    </section>
    </div>
    </div>
</div>

</div>
</main>
<?php include('player.php') ?>

</div>

<?php include('scripts.php') ?>

</body>
</html>