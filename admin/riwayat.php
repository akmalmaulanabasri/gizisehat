<?php
$user_id = $_COOKIE['user_id'];
$riwayat = "SELECT * FROM riwayat_cek";
$cek = mysqli_query($conn, $riwayat);
$row = mysqli_num_rows($cek);
    while($row = mysqli_fetch_assoc($cek)){

        if($row['kelamin'] == "lk")
    {
        $kelamin = "Laki-Laki";
    }
    else if ($row['kelamin'] == "pr")
    {
        $kelamin = "Perempuan";
    }
    
?>

<a href="hasil.php?id=<?= $row['id']?>" class="riwayat-button">
    <div class="riwayat">
        <p><?= $row['tanggal']?></p>
        <div class="baris">
            <div class="kolom">
                <p><?= $kelamin?></p>
                <p>BB : <?= $row['bb']?> KG</p>
            </div>
            <div class="kolom">
                <p>TB : <?= $row['tb']?> CM</p>
                <p>Umur = <?= $row['umur']?> Tahun</p>
            </div>
            <div class="kolom">
                <p>Kebutuhan Kalori : 2033 Kalori</p>
                <p><?= $row['nama']?></p>
            </div>
        </div>
    </div>
</a>

<?php
    }
?>