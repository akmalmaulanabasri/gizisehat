<?php
$kesehatan = array (
    array("Sehat",1),
    array("Sakit Ringan (Flu, Batuk, dll)",2),
    array("Sakit Berat (Pasca Operasi)",3)
);

$jml = count($kesehatan);

for($i=0; $i<$jml; $i++){
    echo "<option value='".$kesehatan[$i][1]."'>".$kesehatan[$i][0]."</option>";
}

?>