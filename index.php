<?php
if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = sha1(uniqid());
    setcookie('user_id', $user_id, time()+3600*24*30);
    $user_id = $_COOKIE['user_id'];
    header("Location: index.php");
}
    include 'lib/database.php';
    include 'lib/header.php';
?>

    <div class="container">
        <div class="card-me">
            <div class="card-me-head">
                <h2>Cek Kebutuhan Gizi Kamu</h2>
            </div>
            <div class="card-me-body">
                <form action="hasil.php" method="post" class="">
                    <div class="form-group">
                        <input type="number" value="" name="umur" min="0" placeholder="Umur" id="" class="inputbox" required>
                        <input type="number" value="" name="tb" min="0" placeholder="Tinggi Badan" id="" class="inputbox" required>
                    </div>
                    <div class="form-group">
                        <input type="number" value="" name="bb" min="0" placeholder="Berat Badan" id="" class="inputbox" required>
                        <select name="jk" id="" aria-placeholder="a" required>
                            <option value="" disabled selected>Jenis Kelamin</option>
                            <option value="lk">Laki-Laki</option>
                            <option value="pr">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="act1" class="inputbox" required>
                            <option value="" disabled selected>Aktifitas 1</option>
                            <?php include'app/kegiatan.php'?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="act2" class="inputbox" required>
                            <option value="" disabled selected>Aktifitas 2</option>
                            <?php include'app/kegiatan.php'?>
                        </select>                    
                    </div>
                    <div class="form-group">
                        <select name="act3" class="inputbox" required>
                            <option value="" disabled selected>Aktifitas 3</option>
                            <?php include'app/kegiatan.php'?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name- name="kesehatan" class="inputbox" required>
                            <option value="" disabled selected>Kesehatan</option>
                            <?php include'app/kesehatan.php'?>
                        </select>                    </div>
                    <div class="form-group">
                        <input type="text" name="nama" placeholder="Nama" id="" class="inputbox" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="hitung" placeholder="Nama" id="" class="mb10">
                    </div>
                </form>
            </div>
        </div>
<div class="card-me">
    <div class="card-me-head">
        <h2>Riwayat Cek Gizi</h2>
    </div>
        <?php
        include 'app/riwayat.php';
        ?>
</div>
    </div>

<?php
include 'lib/footer.php';
?>