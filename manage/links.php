<link rel="stylesheet" href="../vendor/style.scss">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="../pics/icon-01.png">
<link rel="stylesheet" href="../vendor/menu.css">
<?php
    ob_start();
    include('connection.php');
    if(!isset($_SESSION['email'])) {
        header('Location: ../login.php');
    }
?>