
<div id="loader"></div>


<div style="display:none;" id="myDiv">
    <header class="header-top">
        <div class="container clr">
            <div class="row no-margin-col">
                <div class="col span_5">
                    <div class="floatleft">
                        <ul class="inline-ul no-margin">
                            <li><p class="phone-top nova-text">&nbsp;&nbsp;(+62) 85358379716</p></li>
                            <li><p class="mail-top nova-text">&nbsp;&nbsp;&nbsp;&nbsp;siraja010194@gmail.com</p></li>
                        </ul>
                    </div>
                </div>

                <div class="col span_7">
                    <div class="header-social-icons-parent">
                        <div class="header-social-icons clr">
                            <a href="<?php echo $g_plus; ?>" target="_blank">
                                <div class="social-icon-dribbble"></div>
                            </a>
                            <a href="<?php echo $facebook; ?>" target="_blank">
                                <div class="social-icon-facebook"></div>
                            </a>
                            <a href="<?php echo $twitter; ?>" target="_blank">
                                <div class="social-icon-twitter"></div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <header class="header-container">
        <div class="header-elements container">
            <div class="row span_12 no-margin-col">

                <div class="col span_3">
                    <div class="logo">
                        <img src="<?php echo base_url(); ?>asset/web/logo.png" alt="logo">
                    </div>
                </div>

                <?php $this->load->view('widget/top_menu'); ?>


            </div>
        </div>
    </header>

    <section class="title-large">
        <div class="title-large-inner">
            <div class="container clr">
                <div class="row span_12 no-margin-col">

                    <div class="col span_6">
                        <h2>Skripsi Penelitian <a href="http://siwirahmatjanuar.com" target="_blank"><span class="text-bold">Siwi Rahmat Januar</span></a></h2>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <div class="accordion clr">
        <div class="title">DoKument Skripsi</div>
        <div class="inner">
            <div class="title-large-inner">
                <div class="container clr">
                    <div class="row span_12 no-margin-col">
                        <a href="http://file.filkom.ub.ac.id/fileupload//upload/skripsi/201603000061/PR_201603000061.pdf" class="embed">Document Skripsi</a>
                    </div>
                </div>
            </div>
        </div>
        </article>
    </div>

    <div class="accordion clr">
        <div class="title">Manualisasi Skripsi</div>
        <div class="inner">
            <div class="title-large-inner">
                <div class="container clr">
                    <div class="row span_12 no-margin-col">
                        <a href="<?php base_url();?>assets/manualisasi/manualisasi.xlsx" class="embed">Manualisasi Skripsi</a>
                    </div>
                </div>
            </div>
        </div>
        </article>
    </div>

    <div class="accordion clr">
        <div class="title">Cara Kerja Aplikasi</div>
        <div class="inner">
            <div class="title-large-inner">
                <div class="container clr">
                    <div class="row span_12 no-margin-col">
                        <h2>Skripsi ANALISA KRITERIA PENGGUNA INTERNET MENGGUNAKAN ALGORITMA NAIVE BAYES PADA PROXY SERVER </h2>       </div>
                    <div class="col span_8">
                       <!-- <article class="entry">
                       -->     <p>Cara Kerja dari pembahasan Skripsi Saya Adalah Sebagai Berikut :</p>

                            <p>1. Setiap log proxy Squid akan di ambil halaman html nnya untuk dapat di baca seluruh isi codennya :</p>
                            <code><?php


                                echo "".htmlentities($pecah)."";
                                ?></code>

                            <p>2. Didalam Code akan di lakukan filtering menggunakan Regex dengan preg_match_all:</p>
                            <code><?php

                                $string = file_get_contents("./assets/topsites.html");

                                if(preg_match_all("|<a.*(?=href=\"([^\"]*)\")[^>]*>([^<]*)</a>|i", $string, $matches))
                                {
                                     echo 'Pencarian Ditemukan Dari html squid anda : <br>';
                                    $matches = $matches[1];
                                    $list = array();
                                    foreach($matches as $var)
                                    {
                                        print($var."<br>");
                                    }
                                }
                                else
                                {
                                    echo 'Pencarian Tidak Ditemukan';
                                }
                                ?></code>

                            <p>3. Nantinnya akan diambil pada setiap linknny untuk diketahui meta datannya di setiap link dan dijadikan data testing:</p>
                            <code>
                                <table>
                                    <tr>
                                        <th>No</th>
                                        <th>Link</th>
                                        <th>Meta Data(Deskripsi)</th>
                                        <th>Per Kalimat</th>
                                        <th>Kalimat Sama dalam Database</th>
                                    </tr>

                                    <?php
                                    $i = 1;
                                    foreach($metadata as $var1) {
                                        print("<tr>");
                                        print("<td>" . $i . "</td>");
                                        print("<td>" . $var1["link"] . "</td>");
                                        print("<td>" . $var1["metadata"] . "</td>");
                                        print("<td>");
                                        $menyatukan = $var1["metadata"];
                                        $mentah = str_replace([' ', '!', '@', '#', '$', '%', '&', '(', ')', '_', '=', '+', ';', ':', '\\', '/', '*', '-', ',', '|', '.', '*', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'], " ", $menyatukan);
                                        $arr_kalimat = explode(" ", $mentah);
                                        sort($arr_kalimat);
                                        $hasil = array_unique($arr_kalimat);
                                        sort($hasil);

                                        $totalforeach = count($list);
                                        $i++;
                                        foreach ($hasil as $var4) {
                                            echo "$var4"."<br>";

                                        }

                                        print("<td>");
                                        foreach ($hasil as $var4) {

                                            $ql = $this->db->select('*')->from('data_latih')->where('nama_data', $var4)->where('status', 2)->get();
                                            if ($ql->num_rows() > 0) {
                                                echo "$var4" . "<br>";
                                            } else {

                                            }
                                        }


                                        print("</td>");


                                        print("</td>");
                                        print("</tr>");

                                    }
                                    ?>

                                </table>

                            </code>

                            <p>4. selanjutnnya datatesting akan di cari hasilnnya dengan menyesuaikan dengan data latih seperti yang diambil dari kamus bahasa indonesia dan bahasa inggris dengan berbagai data berikut ini:</p>
                            <code>
                                <table>
                                    <tr>
                                        <th>No</th>
                                        <th>Deskripsi Metatag data Dan Data Latih</th>
                                        <th>Jenis Latih</th>
                                        <th>Jenis Kategori</th>
                                    </tr>

                                    <?php
                                    $i2=1;
                                    $test_jumlah=0;
                                    foreach($hasil2 as $var)
                                    {

                                        print("<tr>");
                                        print("<td>".$i2."</td>");
                                        print("<td>".$var["nama_data"]."</td>");
                                        print("<td>".$var["nama_kategori"]."</td>");
                                        print("<td>".$var["nama_jenis"]."</td>");
                                        print("</tr>");
                                        /* $i2++;*/
                                        $test_jumlah +=1;

                                        $i2++;
                                    }
                                    echo "test jumalh url = ".$test_jumlah;
                                    ?>


                                    <?php
                                    $i = 1;
                                    foreach($metadata as $var1)
                                    {
                                        $list1[$i] = $var1["metadata"];
                                        print("<tr>");
                                        print("<td>z".$i."</td>");
                                        print("<td>".$var1["metadata"]."</td>");
                                        print("<td>"."?"."</td>");
                                        print("<td>"."?"."</td>");
                                        print("</tr>");
                                        $i++;
                                    }


                                    ?>

                                </table>


                            </code>

                            <p>4. selanjutnnya datatesting akan di cari hasilnnya dengan menyesuaikan dengan data latih seperti yang diambil dari kamus bahasa indonesia dan bahasa inggris dengan berbagai data berikut ini:</p>
                            <code>

                                <?php
                                $ra = '/test/';
                                $ra1 = 'test';

                                $str = 'test ada test du suatu tes dahulu dimana test tersebut menyatakan dengan ini bahwa test';
                                $str1 = 'test ada test du suatu tes dahulu dimana test tersebut menyatakan dengan ini bahwa test';
                                $stredit =  str_replace(" ", ",", $str);
                                preg_match_all($ra, $str, $matches);
                                $str = str_replace("$ra1","", "$str", $count);

                                // Print the entire match result
                                echo "Testing regex Text : ".$ra."<br>";
                                print_r("testing Meta Data : ".$str1."<br>");
                                echo "testing array : ";
                                $hasil=print_r($matches);
                                print_r($hasil."<br>");

                                print_r('Total Yang Sama Adalah '.$count);
                                ?>

                            </code>

                            <p>5. Selanjutnnya setiap link metatag dapat di hitung secara automatis menjadi tabel term berikut ini </p>

                                <table>
                                    <tr>

                                        <th>No</th>

                                        <th>Term(Frekuensi Data Acak)</th>
                                    <?php
                                        $i=1;
                                        foreach ($hasil2 as $var) {
                                            print_r("<th>" .$i . $var["nama_data"]. "</th>");
                                            $i++;
                                        }

                                        ?>

                                        <?php

                                        $i=1;
                                            foreach ($metadata as $var) {
                                                    print_r("<th>" ."x".$i . "</th>");
                                                    $i++;
                                                }

                                        ?>

                                            <?php
                                                $list = array();
                                                $i = 1;
                                                foreach($hasil3 as $var) {
                                                    $list[$i] = $var["nama_data"];
                                                    $i++;
                                                }
                                            $menyatukan=implode($list);
                                            $mentah=str_replace([' ','!','@','#','$','%','&','(',')','_','=','+',';',':', '\\', '/', '*','-',',', '|' ,'.','*','1','2','3','4','5','6','7','8','9','0']," ",$menyatukan);
                                            $arr_kalimat = explode (" ",$mentah);
                                            sort($arr_kalimat);
                                            $hasil = array_unique($arr_kalimat);

                                            $totalforeach = count($list);

                                            sort($hasil1);
                                            $i=1;
                                            foreach($hasil1 as $var4){

                                                echo "<tr>"."<th>".$i."</th>"."<th>".$var4['nama_data']."</th>";
                                                for ($i2= 1; $i2 <= $totalforeach; $i2++)
                                                {
                                                    $ra1 = $var4['nama_data'];
                                                    $str = $list[$i2];

                                                    str_replace("$ra1","", "$str", $count);

                                                    print_r("<th>".$count."</th>");

                                                    $hitung[] = $count;
                                                }
                                                $i++;


                                            }
                                            echo "Max IF = ".max($hitung);

                                            ?>
                                    </tr>



                                </table>

                        <p>6. Hitung Term Frequency (TFi) Normalized </p>
                        <table>
                            <tr>

                                <th>No</th>

                                <th>Term(Frekuensi Data Acak)</th>
                                <?php
                                $i=1;
                                foreach ($hasil2 as $var) {
                                    print_r("<th>" .$i . "</th>");
                                    $i++;
                                }

                                ?>

                                <?php
                                $list1 = array();
                                $i=1;
                                foreach ($metadata as $var) {
                                    $list1[$i] = $i;
                                    print_r("<th>" ."x".$i . "</th>");
                                    $i++;
                                }

                                ?>
                                <th>DF</th>
                                <th>IDF</th>

                                <?php
                                $i=1;
                                foreach ($hasil2 as $var) {
                                    $list2[$i] = $i;
                                    print_r("<th>" .$i . "</th>");

                                    $i++;
                                }

                                ?>

                                <?php
                                $list1 = array();
                                $i=1;
                                foreach ($metadata as $var) {
                                    $list1[$i] = $i;
                                    print_r("<th>" ."x".$i . "</th>");
                                    $i++;
                                }

                                ?>


                                <?php
                                $list = array();
                                $i = 1;
                                foreach($hasil3 as $var) {
                                    echo "<tr>" . "<th>" . $i . "</th>" . "<th>" . $var4['nama_data'] . "</th>";
                                    $list[$i] = $var["nama_data"];
                                    $i++;
                                }
                                $menyatukan=implode($list);
                                $mentah=str_replace([' ','!','@','#','$','%','&','(',')','_','=','+',';',':', '\\', '/', '*','-',',', '|' ,'.','*','1','2','3','4','5','6','7','8','9','0']," ",$menyatukan);
                                $arr_kalimat = explode (" ",$mentah);
                                sort($arr_kalimat);
                                $hasil = array_unique($arr_kalimat);

                                $totalforeach = count($list);
                                $totalforeach1 = count($list2);
                                $totalforeach2 = count($i);

                                sort($hasil1);
                                $i=1;

                                foreach($hasil1 as $var4) {

                                    echo "<tr>" . "<th>" . $i . "</th>" . "<th>" . $var4['nama_data'] . "</th>";
                                    $sum=0;
                                    for ($i2 = 1; $i2 <= $totalforeach; $i2++) {
                                        $ra1 = $var4['nama_data'];
                                        $str = $list[$i2];

                                        str_replace("$ra1", "", "$str", $count);
                                        $normalized = $count / max($hitung);
                                        print_r("<th>" . $normalized . "</th>");

                                        if($count>0){
                                            $hitung1=1;
                                            $sum +=$hitung1;
                                        }else{
                                            $hitung1=0;
                                            $sum +=$hitung1;
                                        }

                                    }
                                    print_r("<th>" . $sum . "</th>");

                                if( isset($sum) && $sum != 0 ){
                                    $test=(log10($test_jumlah/$sum));
                                    print_r("<th>" . $test . "</th>");
                                }else{
                                    print_r("<th>" . 0 . "</th>");
                                     }
                                    for ($i2 = 1; $i2 <= $totalforeach; $i2++) {
                                        $ra1 = $var4['nama_data'];
                                        $str = $list[$i2];

                                        str_replace("$ra1", "", "$str", $count);
                                        $tf_idf = $count*$test;
                                        print_r("<th>" . $tf_idf . "</th>");

                                    }



                                $i++;
                                }







                                ?>
                            </tr>



                        </table>
                        <p>7. Hitung ni </p>
                            <table>
                                <tr>
                                    <th>Prior</th>
                                <tr>
                                    <th>1</th>
                                    <th>2</th>
                                </tr>
                                <tr>

                                        <?php
                                        $i=1;
                                        $sum5 = 0;
                                        $sum6 = 0;
                                        foreach($hasil2 as $var)
                                        {
/*                                            print("<th>".$var["id_kategori"]."</th>");*/
                                           /* $test123[$i]=$var["id_kategori"];*/

                                            if ($var["id_kategori"] == 1) {
                                                $hitung2 = 1;
                                               /* print_r("<th>" . $hitung2 . "</th>");*/
                                                $sum5 += $hitung2;
                                            } else {
                                                $hitung2 = 0;
                                                /*print_r("<th>" . $hitung2 . "</th>");*/
                                                $sum5 += $hitung2;
                                            }


                                            if ($var["id_kategori"] == 2) {
                                                $hitung3 = 1;
                                                $sum6 += $hitung3;
                                            } else {
                                                $hitung3 = 0;
                                                $sum6 += $hitung3;
                                            }


                                            $i++;
                                        }
                                        $max=max($hitung);
                                        $prior1= $sum5/$test_jumlah;
                                        $prior2= $sum6/$test_jumlah;
                                        print_r("<th>".$prior1."</th>");
                                        print_r("<th>".$prior2."</th>");


                                        ?>

                                </tr>
                                </tr>
                                <tr>
                                    <th></th>
                                </tr>

                        <tr>
                            <th>Class</th>
                        <?php
                        $i=1;
                        foreach($hasil2 as $var)
                        {
                            print("<th>".$var["id_kategori"]."</th>");
                            $test123[$i]=$var["id_kategori"];
                            $i++;
                        }
                        ?>

                        </tr>
                                <tr>
                                    <th><?php /*print_r($totalforeach2) */?></th>
                                </tr>

                         <tr>


                             <th>Term</th>
                             <?php
                             $i=1;
                             foreach ($hasil2 as $var) {
                                 print_r("<th>" .$i . "</th>");
                                 $i++;
                             }

                             ?>

                             <?php

                             $i=1;
                             foreach ($hasil2 as $var) {
                                 print_r("<th>" ."x".$i . "</th>");
                                 $i++;
                             }

                             print_r("<th>" ."Ni 1"."</th>");
                             print_r("<th>" ."Ni 2"."</th>");


                             $i=1;
                             $sum8 = 0;
                             $sum9 = 0;
                             foreach($hasil1 as $var4) {

                                 echo "<tr>" . "<th>" . $i . "</th>";
                                 $sum3 = 0;
                                 for ($i2 = 1; $i2 <= $totalforeach1; $i2++) {
                                     $ra1 = $var4['nama_data'];
                                     $str = $list[$i2];

                                     str_replace("$ra1", "", "$str", $count);

                                     $normalized1 = $count;

                                     if ($test123[$i2] == 1) {
                                         $hitung1 = 1*$normalized1;
                                         print_r("<th>" . $hitung1 . "</th>");
                                         $sum3 += $hitung1;
                                     } else {
                                         $hitung1 = 0*$normalized1;
                                         print_r("<th>" . $hitung1 . "</th>");
                                         $sum3 += $hitung1;
                                     }
                                    $sum3 += $hitung1;
                                 }

                                 $sum4 = 0;
                                 for ($i2 = 1; $i2 <= $totalforeach1; $i2++) {
                                     $ra1 = $var4['nama_data'];
                                     $str = $list[$i2];

                                     str_replace("$ra1", "", "$str", $count);

                                     $normalized1 = $count;


                                     if ($test123[$i2] == 2) {
                                         $hitung2 = 1*$normalized1;
                                         print_r("<th>" . $hitung2 . "</th>");
                                         $sum4 += $hitung2;
                                     } else {
                                         $hitung2 = 0*$normalized1;
                                         print_r("<th>" . $hitung2 . "</th>");
                                         $sum4 += $hitung2;
                                     }

                                 }


                                 print_r("<th>".$sum3."</th>");
                                 $sum8 +=$sum3;
                                 $sum3t[$i]=$sum3;

                                 print_r("<th>".$sum4."</th>");
                                 $sum9 +=$sum4;
                                 $sum4t[$i]=$sum4;

                                 $i++;
                             }

                             ?>




                         </tr>

                                <tr>
                                    <th>Total</th>
                                    <th>ni</th>
                                </tr>
                                <tr>

                                <?php
                                    print_r("<th>".$sum8."</th>");
                                    print_r("<th>".$sum9."</th>");
                                ?>
                                </tr>

                            </table>


                            <tr>

                                <p>8. lookprior dan hasil </p>
                                <table>
                                   <tr>


                                        <th>Term</th>
                                        <th>likehood(+)</th>
                                        <th>likehood(-)</th>



                                       <?php
                                       $i=1;
                                       foreach ($hasil2 as $var) {
                                           print_r("<th>" ."(+)".$i . "</th>");
                                           print_r("<th>" ."(-)".$i . "</th>");
                                           $i++;
                                       }

                                       ?>

                                       <?php

                                       $i=1;
                                       foreach ($metadata as $var) {
                                           print_r("<th>" ."(X+)".$i . "</th>");
                                           print_r("<th>" ."(X-)".$i . "</th>");
                                           $i++;
                                       }

                                        $i4=0;
                                        $i1=1;
                                        $i3=1;
                                        $sum10=0;
                                        $sum11=0;
                                        $sum12=0;

                                        $to_product = [];
                                        $to_product1 = [];
                                        foreach($hasil1 as $var5) {

                                            echo "<tr>" . "<th>" . $i1 . "</th>";

                                            $hasillikehood = ($sum3t[$i1] + 1) / ($sum8 + 0);
                                            if ( $sum9 == 0 )
                                            {
                                                $hasillikehood1=0; // don't divide by zero, handle special case
                                            } else {
                                                $hasillikehood1 = ($sum4t[$i1] + 1) / ($sum9 + 0);
                                            }


                                            $sum10 +=$hasillikehood;
                                            $sum11 +=$hasillikehood1;

                                            print_r( "<th>".$hasillikehood . "</th>");
                                            print_r( "<th>".$hasillikehood1 . "</th>");

                                            $myArray = array();
                                            $myArray1 = array();
                                              for ($i2 = 1; $i2 <= $totalforeach; $i2++) {
                                                    $ra1 = $var5['nama_data'];
                                                    $str = $list[$i2];

                                                    str_replace("$ra1", "", "$str", $count);
                                                    if ($count > 0) {
                                                        $hitung0 = 1;
                                                    } else {
                                                        $hitung0 = 0;
                                                    }
                                                    $hasillikehood2 = pow($hasillikehood, $hitung0);
                                                    $hasillikehood3 = pow($hasillikehood1, $hitung0);
                                                    print_r("<th>" . $hasillikehood2 . "</th>");
                                                    print_r("<th>" . $hasillikehood3 . "</th>");
                                                    $myArray[$i2] = $hasillikehood2;
                                                    $myArray1[$i2] = $hasillikehood3;

                                                }
                                            array_push($to_product, $myArray);
                                            array_push($to_product1, $myArray1);
//                                            print_r($myArray);
                                            /*print_r($myArray1);*/
                                            $sum12 += $i3;
                                            $i4++;
                                            $i1++;

                                        }
                                        $total_product = $to_product[0];
                                        for($i = 1; $i < count($to_product); $i++){
                                            for($j = 1; $j <= count($total_product); $j++){
                                                $total_product[$j] = $total_product[$j] * $to_product[$i][$j];
                                            }

                                        }
                                        $total_product1 = $to_product1[0];
                                        for($i = 1; $i < count($to_product1); $i++){
                                            for($j = 1; $j <= count($total_product1); $j++){
                                                $total_product1[$j] = $total_product1[$j] * $to_product1[$i][$j];
                                            }

                                        }

                                        ?>
                                    <tr>
                                        <th></th>
                                        </th> <th>Total</th>
                                        <th>LikeHood</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>x1</th>
                                        <th>x2</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <?php
                                        print_r( "<th>".$sum10 . "</th>");
                                        print_r( "<th>".$sum11 . "</th>");
                                        ?>
                                    </tr>
                                        <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Product</th>

                                       <!-- --><?php
                                        for($j = 1; $j <= count($total_product1); $j++){

                                            print_r("<th>" . $total_product[$j] . "</th>");
                                            print_r("<th>" . $total_product1[$j] . "</th>");

                                        }
                                        echo "<tr>";
                                        echo "<th></th><th></th><th>Hasil Posterior</th>";
                                        for($j = 1; $j <= count($total_product1); $j++){
                                            $hasilposterior=$prior1*$total_product[$j];
                                            print_r("<th>" . $hasilposterior . "</th>");

                                            $hasilposterior1=$prior2*$total_product1[$j];
                                            print_r("<th>" . $hasilposterior1 . "</th>");

                                        }
                                        echo "<tr>";
                                        echo "<th></th><th></th><th>Hasil Klasifikasi</th>";
                                        for($j = 1; $j <= count($total_product1); $j++){
                                            $hasilposterior=$total_product[$j]*$prior1;
                                            $hasilposterior1=$total_product1[$j]*$prior2;

                                            if ( $hasilposterior >= $hasilposterior1) {

                                                 print_r("<th>" . "Pengguna Positif" . "</th><th></th>");

                                            } else {

                                                print_r("<th>" . "Pengguna Negatif" . "</th></th><th></th>");

                                            }
                                        }
                                        ?>

                                    </tr>




                                    </tr>



                                </table>
                    </div>
                    </p></div>

            </div>
            </article>

        </div>
    </div>
</div>
</div>
</div>
</div>

<div style="display:none;" id="myDiv">
    <div id="container" class="animate-bottom">


    </div>

</div>
<script>
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 3000);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }
</script>