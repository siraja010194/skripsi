<?php
/*$arr_kata = ["satu", "dua", "tiga", "empat", "lima"];
$kalimat = implode(", ",$arr_kata);
echo $kalimat;
*/?>

    <br>

<?php
$arr_kata = ["satu", "dua", "tiga", "empat", "lima"];
$arr_kata1 = ["sepuluh", "tujuh", "delapan", "sembilan", "enam"];
$arr_kata2 = ["sebelah", "duabelas", "empatbelas", "tigabelas", "limabelas"];
$kalimat = implode(" | ",$arr_kata);
$gabung = array_merge($arr_kata,$arr_kata1,$arr_kata2);
array_multisort($arr_kata, $arr_kata1,$arr_kata2);
$num=array_merge($arr_kata, $arr_kata1);
array_multisort($num,SORT_DESC,SORT_NUMERIC);
/*print_r($num);*/

$i = 1;
foreach($gabung as $val)

{
    echo $i;
    echo "$val"."<br>";
    $i++;
}

// satu | dua | tiga | empat | lima
?>


<?php
$a1=array(1,30,15,7,25);
$a2=array(4,30,20,41,66);
$num=array_merge($a1,$a2);
array_multisort($num,SORT_DESC,SORT_NUMERIC);
print_r($num);
?>
<br>


<?php
$nama = array("Dedi", "Amir", "Sutejo", "Zul Amri", "Samsidar");
$nama1 = array("siwi", "januar", "rahmat", "aisah", "Maulani");
sort($nama);   //Urut naik Nilai Array Berindeks

$jumlah=count($nama);
echo "<p>Jumlah Peserta = ".$jumlah." orang</p>";
echo "<p>Daftar Nama Peserta:</p>";


echo "<ul>";
for($x=0;$x<$jumlah;$x++) {
    echo "<li>";
    echo $nama[$x];
    echo "</li>";
}
echo "</ul>";
?>