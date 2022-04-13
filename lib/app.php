<?php
include 'app/aktifitas.php';
include 'app/makanan.php';
include 'database.php';

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = sha1(uniqid());
    setcookie('user_id', $user_id, time()+3600*24*30);
}

if(isset($_POST['hitung']))
{
    $u = $_POST['umur'];
    $bb = $_POST['bb'];
    $tb = $_POST['tb'];
    $kelamin = $_POST['jk'];
    $act1 = $_POST['act1'];
    $act2 = $_POST['act2'];
    $act3 = $_POST['act3'];
    $stres = $_POST['kesehatan'];
    $tanggal = date('Y-m-d');
    $jam = date('H:i:s');
    $nama = $_POST['nama'];

    $id_user = $user_id;

    $act = $act1 + $act2 + $act3;
    $act = $act / 3;

    // echo $act ."<br>";

    if($kelamin == "lk")
    {
        $bmr = 66;
        $bmr += 13.7 * $bb;
        $bmr += 5 * $tb;
        $bmr1 = 6.8 * $u;
        $bmr = $bmr - $bmr1;
        $kelamin = "Laki-Laki";
    }
    else if ($kelamin == "pr")
    {
        $bmr = 655;
        $bmr += 9.56 * $bb;
        $bmr += 1.85 * $tb;
        $bmr1 = 4.68 * $u;
        $bmr = $bmr - $bmr1;
        $kelamin = "Perempuan";
    }

    $faktoraktifitas = $aktifitas[$act];
    $faktorstress = $stress[$stres];
    $kalori = $bmr * $faktoraktifitas * $faktorstress;
    // echo $kalori . " kkal <br>";

    $bmi = $bb / (($tb/100) * ($tb/100));
    // echo "BMI = ".number_format($bmi). "<br>";

    if($bmi < 18.5)
    {
        $keterangan = "Kekurangan Berat Badan";
        $golongan = "C";
    }
    else if($bmi >= 18.5 && $bmi <= 24.9)
    {
        $keterangan = "Normal";
        $golongan = "B";
    }
    else if($bmi >= 25 && $bmi <= 29.9)
    {
        $keterangan = "Kelebihan Berat Badan";
        $golongan = "B";
    }
    else if($bmi >= 30 && $bmi <= 39.9)
    {
        $keterangan = "Kegemukan";
        $golongan = "A";
    }
    else if($bmi >= 40)
    {
        $keterangan = "Kegemukan Berat";
        $golongan = "A";
    }

    if(($kalori > 2000) && ($kalori < 2100))
    {
        // echo "test";
    }

    $insert = "INSERT INTO `riwayat_cek` (`umur`, `bb`, `tb`, `kelamin`, `act1`, `act2`, `act3`, `stres`, `kalori`,`nama`, `tanggal`, `jam`, `id_user`) VALUES ('$u', '$bb', '$tb', '$kelamin', '$act1', '$act2', '$act3', '$stres', '$kalori', '$nama', '$tanggal', '$jam' , '$id_user')";
    $query = mysqli_query($conn, $insert);
    if(!$query)
    {
        die(var_dump(mysqli_error($conn)));
    }else{
        $id = "SELECT id FROM riwayat_cek ORDER BY id DESC LIMIT 1";
        $cek = mysqli_query($conn, $id);
        $row = mysqli_fetch_assoc($cek);
        $id = $row['id'];
        header("Location: hasil.php?id=$id");
    }
}else

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM `riwayat_cek` WHERE `id` = $id AND id_user = '$user_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if(($row) == null){
        header("Location: index.php");
    }
    $u = $row['umur'];
    $bb = $row['bb'];
    $tb = $row['tb'];
    $kelamin = $row['kelamin'];
    $act1 = $row['act1'];
    $act2 = $row['act2'];
    $act3 = $row['act3'];
    $stres = $row['stres'];
    $tanggal = $row['tanggal'];
    $jam = $row['jam'];
    $nama = $row['nama'];

    $act = $act1 + $act2 + $act3;
    $act = $act / 3;

    if($kelamin == "lk")
    {
        $bmr = 66;
        $bmr += 13.7 * $bb;
        $bmr += 5 * $tb;
        $bmr1 = 6.8 * $u;
        $bmr = $bmr - $bmr1;
        $kelamin = "Laki-Laki";
    }
    else if ($kelamin == "pr")
    {
        $bmr = 655;
        $bmr += 9.56 * $bb;
        $bmr += 1.85 * $tb;
        $bmr1 = 4.68 * $u;
        $bmr = $bmr - $bmr1;
        $kelamin = "Perempuan";
    }

    $faktoraktifitas = $aktifitas[$act];
    $faktorstress = $stress[$stres];
    $kalori = $bmr * $faktoraktifitas * $faktorstress;

    $update = "UPDATE `riwayat_cek` SET `kalori` = '$kalori' WHERE `riwayat_cek`.`id` = $id";
    $query = mysqli_query($conn, $update);
    if(!$query)
    {
        die(var_dump(mysqli_error($conn)));
    }
    // echo $kalori . " kkal <br>";

    $bmi = $bb / (($tb/100) * ($tb/100));
    // echo "BMI = ".number_format($bmi). "<br>";

    if($bmi < 18.5)
    {
        $keterangan = "Kekurangan Berat Badan";
        $golongan = "C";
    }
    else if($bmi >= 18.5 && $bmi <= 24.9)
    {
        $keterangan = "Normal";
        $golongan = "B";
    }
    else if($bmi >= 25 && $bmi <= 29.9)
    {
        $keterangan = "Kelebihan Berat Badan";
        $golongan = "B";
    }
    else if($bmi >= 30 && $bmi <= 39.9)
    {
        $keterangan = "Kegemukan";
        $golongan = "A";
    }
    else if($bmi >= 40)
    {
        $keterangan = "Kegemukan Berat";
        $golongan = "A";
    }
}else{
    header("Location: index.php");
}

?>