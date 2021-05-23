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

            <div class="playlist" style="display:block">
                <h5 style="color:white;margin-top:3%;margin-bottom:2%"><?php
                    $id_playlist = $_GET['id'];
                    $sql = "SELECT * FROM playlists WHERE id='$id_playlist'";
                    $query = mysqli_query($connect, $sql);
                    while($row = mysqli_fetch_array($query)){
                        $name = $row['playlist_name'];
                        echo "$name";
                    }
                    ?></h5>
                <table class="table table-secondary" style="margin-top: 5%;line-height:2em">
                    <thead>
                    <tr>
                        <th scope="col">Song name</th>
                        <th scope="col">Artist</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="table table-dark">
                        <?php
                        $sql = "SELECT * FROM playlists_container WHERE creator = '$email' AND playlist_id = '$id_playlist'";
                        $query = mysqli_query($connect, $sql);
                        $num = mysqli_num_rows($query);
                        if($num > 0) {
                            while ($row = mysqli_fetch_array($query)){
                                $id = $row['id'];
                                $song = $row['song_id'];
                                $sql_song = "SELECT * FROM tracks WHERE id='$song'";
                                $query_song = mysqli_query($connect, $sql_song);
                                while($row_song = mysqli_fetch_array($query_song)){
                                    $name_track = $row_song['track_name'];
                                    $artist = $row_song['author'];
                                }
                                echo "<td><a href='track.php?id=$song'>$name_track</a></td>
<td><a href='track.php?id=$song'>$artist</a></td>
<td><a href='delete_song_playlist.php?id=$id'><i class='fal fa-trash-alt'></i></a></td>";
                            }
                        } else {
                            echo "<span style='color:white'>No Ghannely in this playlist</span>";
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