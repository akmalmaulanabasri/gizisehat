<?php

$conn = mysqli_connect("localhost", "root", "root", "gizisehat");

$makanan = "SELECT * FROM data_makanan";
$makanan = mysqli_query($conn, $makanan);
$cek = mysqli_num_rows($makanan);
while($row = mysqli_fetch_assoc($makanan)){
    $gambar = str_replace(' ', '-', strtolower($row['nama_makanan'])) . '.jpg';
    echo $gambar . "<br>";

    $query = "UPDATE data_makanan SET gambar = '$gambar' WHERE id = '$row[id]'";
    $update = mysqli_query($conn, $query);
}