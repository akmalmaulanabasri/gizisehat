<?php
if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = sha1(uniqid());
    setcookie('user_id', $user_id, time()+3600*24*30);
    $user_id = $_COOKIE['user_id'];
    header("Location: index.php");
}
    include '../lib/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gizi Sehat</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://kit.fontawesome.com/e54b3d474c.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <div class="judul-utama"><a href="#"><h1>GIZI SEHAT</h1></a></div>
        <ul class="icons">
            <a href="#" class="icon-header"><li><i class="fa fa-home"></i></li></a>
            <!-- <a href="#" class="icon-header"><li><i class="fa fa-history"></i></li></a> -->
            <!-- <a href="#" class="icon-header"><li><i class="fa fa-info-circle"></i></li></a> -->
            <!-- <a href="#" class="icon-header"><li><i class="fa fa-heart"></i></li></a> -->
        </ul>
    </div>
    <div class="container">
<div class="card-me w100">
    <div class="card-me-head">
        <h2>Riwayat Cek Gizi</h2>
    </div>
        <?php
        include 'riwayat.php';
        ?>
</div>
    </div>

    <div class="footer">
        <ul class="icons-footer">
            <a href="#" class="icon-footer"><li><i class="fa fa-home"></i></li></a>
            <!-- <a href="#" class="icon-footer"><li><i class="fa fa-history"></i></li></a> -->
            <!-- <a href="#" class="icon-footer"><li><i class="fa fa-info-circle"></i></li></a> -->
            <!-- <a href="#" class="icon-footer"><li><i class="fa fa-heart"></i></li></a> -->
        </ul>
    </div>
</body>
</html>