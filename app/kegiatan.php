<?php
$kegiatan = array (
    array("Istirahat",1),
    array("Belajar",2),
    array("Bekerja",2),
    array("Bersepeda",3),
    array("Mengajar",2),
    array("Jogging",3)
);

$jumlahKegiatan = count($kegiatan);

for($i=0; $i<$jumlahKegiatan; $i++){
    echo "<option value='".$kegiatan[$i][1]."'>".$kegiatan[$i][0]."</option>";
}

?>