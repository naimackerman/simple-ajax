<?php
    header("content-Type: text/xml");
    $nama = $_GET['nama'];

    echo "<response>";

    $myFamily = array("ROSIMAN", "AMALIA", "FAZA", "NADA");

    if (in_array(strtoupper($nama), $myFamily)) {
        echo "Halo &lt;strong&gt;" . htmlentities($nama) . "&lt;/strong&gt; , Anda adalah anggota keluarga saya" ;
    }
    else if (trim($nama) == "") {

        echo "Hai orang asing, silakan tulis namamu";
    }
    else {
        echo "&lt;strong&gt;" . htmlentities($nama) . "&lt;/strong&gt;, Anda bukan anggota keluarga saya";
    }

    echo "</response>";
?>