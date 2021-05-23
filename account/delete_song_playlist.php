<?php
include ('connection.php');
$id = $_GET['id'];
$sql = "DELETE FROM playlists_container WHERE id='$id'";
$query = mysqli_query($connect, $sql);
if($query) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>