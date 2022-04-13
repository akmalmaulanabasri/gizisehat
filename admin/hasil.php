<?php
    include 'app.php';
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
        <div class="judul-utama"><a href="index.php"><h1>GIZI SEHAT</h1></a></div>
        <ul class="icons">
            <a href="index.php" class="icon-header"><li><i class="fa fa-home"></i></li></a>
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
            <div class="card-me-body hasilcek">
                <div class="riwayat riwayathasil w100">
                        <p>Hasil Cek Gizi</p>
                    <div class="baris">
                        <div class="kolom">
                            <p>Jenis Kelamin : <?php echo $kelamin?></p>
                            <p>Berat Badan : <?= $bb?> KG</p>
                            <p>Kebutuhan : <?= $kalori?> Kalori</p>
                        </div>
                        <div class="kolom">
                            <p>Tinggi Badan : <?= $tb?> CM</p>
                            <p>Umur : <?= $u?> Tahun</p>
                        </div>
                    </div>
                </div>
                <div class="riwayat riwayathasil w100">
                        <p>Tinggi & Berat Badan Ideal Bedasarkan Umur</p>
                    <div class="baris">
                        <div class="kolom">
                            <p>Jenis Kelamin : <?php echo $kelamin?></p>
                            <!-- <p>Berat Badan : 55</p> -->
                        </div>
                        <div class="kolom">
                            <!-- <p>Kebutuhan : 2200 Kalori</p> -->
                            <p>Indeks Masa Tubuh = <?= number_format($bmi)?></p>
                        </div>
                    </div>
                    <div class="card-me-head">
                        <p><?php echo $keterangan?></p>
                    </div>
                </div>
            </div>
            <div class="card-me-body flexbox">
                <div class="riwayat w100">
                    <h2>Rekomendasi Asupan Makanan</h2>
                    <?php
                    $rekomendasi = "SELECT * FROM data_makanan Where kategori = 'Makanan Pokok' AND golongan = '$golongan' ORDER by kalori DESC limit 3";
                    $result = mysqli_query($conn, $rekomendasi);
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <div class="card-makanan">
                        <!-- <div class="gambar"></div> -->
                        <img class="gambar" src="../assets/img/<?=$row['gambar']?>" alt="">
                        <div class="deskripsi-makanan">
                            <h2><?= $row['nama_makanan']?></h2>
                            <p><?= $row['kalori']?> Kalori</p>
                        </div>
                    </div>
                        <?php
                    }
                    ?>
                    <?php
                    $rekomendasi = "SELECT * FROM data_makanan Where kategori = 'Fast Food' AND golongan = '$golongan' ORDER by kalori DESC limit 3";
                    $result = mysqli_query($conn, $rekomendasi);
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <div class="card-makanan">
                        <!-- <div class="gambar"></div> -->
                        <img class="gambar" src="../assets/img/<?=$row['gambar']?>" alt="">
                        <div class="deskripsi-makanan">
                            <h2><?= $row['nama_makanan']?></h2>
                            <p><?= $row['kalori']?> Kalori</p>
                        </div>
                    </div>
                        <?php
                    }
                    ?>
                    <?php
                    $rekomendasi = "SELECT * FROM data_makanan Where kategori = 'Minuman' ORDER by kalori DESC limit 3";
                    $result = mysqli_query($conn, $rekomendasi);
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <div class="card-makanan">
                        <!-- <div class="gambar"></div> -->
                            <img class="gambar" src="../assets/img/<?=$row['gambar']?>" alt="">
                        <div class="deskripsi-makanan">
                            <h2><?= $row['nama_makanan']?></h2>
                            <p><?= $row['kalori']?> Kalori</p>
                        </div>
                    </div>
                        <?php
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>



    <div class="footer">
        <ul class="icons-footer">
            <a href="index.php" class="icon-footer"><li><i class="fa fa-home"></i></li></a>
            <!-- <a href="#" class="icon-footer"><li><i class="fa fa-history"></i></li></a> -->
            <!-- <a href="#" class="icon-footer"><li><i class="fa fa-info-circle"></i></li></a> -->
            <!-- <a href="#" class="icon-footer"><li><i class="fa fa-heart"></i></li></a> -->
        </ul>
    </div>
</body>
</html>