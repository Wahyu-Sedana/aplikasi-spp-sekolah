<?php

class Spp extends Databases{

    // tambah spp
    public static function createSpp($post){
        $tahun = $post['tahun'];
        $nominal = $post['nominal'];

        $dataSpp = self::fetch("SELECT * FROM tb_spp WHERE tahun='$tahun'");
        if($dataSpp){
            echo '<script>alert("data spp yang anda masukkan, sudah ada")</script>';
            return false;
        }

        $spp = self::query("INSERT INTO tb_spp VALUES(null, '$tahun', '$nominal')");

        if($spp){
            echo '<script>alert("data spp berhasil di tambahkan");
            document.location.href= "data-spp.php";</script>';
        }else{
            echo mysqli_errno(self::connection());
        }
    }

    // edit spp
    public static function editSpp($post){
        $id_spp = $post['id_spp'];
        $tahun = $post['tahun'];
        $nominal = $post['nominal'];

        $spp = self::query("UPDATE tb_spp SET tahun='$tahun', nominal='$nominal' WHERE id_spp='$id_spp'");

        if($spp){
            echo '<script>alert("data spp berhasil di perbaharui");
            document.location.href= "data-spp.php";</script>';
        }else{
            echo mysqli_errno(self::connection());
        }
    }

    // hapus spp
    public static function hapusSpp($get){
        $id_spp = $get;

        $spp = self::query("DELETE FROM tb_spp WHERE id_spp='$id_spp'");

        if($spp){
            echo '<script>alert("data spp berhasil di hapus");
            document.location.href= "data-spp.php";</script>';
        }else{
            echo mysqli_errno(self::connection());
        }
    }
}