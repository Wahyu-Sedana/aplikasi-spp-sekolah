<?php

class Petugas extends Databases{
    // tambah petugas
    public static function createPetugas($post){
        $username = $post['username'];
        $password =$post['password'];
        $nama_petugas = $post['nama'];
        $level = $post['level'];

        $petugas = self::query("INSERT INTO tb_petugas VALUES(null, '$username', '$password', '$nama_petugas', '$level')");
        if($petugas){
            echo "<script>alert('data petugas berhasil di perbaharui');
            document.location.href= 'data-petugas.php';
            </script>";
        }else{
            echo mysqli_errno(self::connection());
        }
    }

    // edit petugas
    public static function editPetugas($post){
        $id_petugas = $post['id_petugas'];
        $username = $post['username'];
        $password =$post['password'];
        $nama_petugas = $post['nama'];
        $level = $post['level'];

        $petugas = self::query("UPDATE tb_petugas SET username='$username', password='$password', nama_petugass='$nama_petugas', level='$level' WHERE id_petugas='$id_petugas'");
        if($petugas){
            echo "<script>alert('data petugas berhasil di perbaharui');
            document.location.href= 'data-petugas.php';
            </script>";
        }else{
            echo mysqli_errno(self::connection());
        }
    }

    // hapus petugas
    public static function hapusPetugas($get){
        $id_petugas = $get;

        $petugas = self::query("DELETE FROM tb_petugas WHERE id_petugas='$id_petugas'");
        if($petugas){
            echo "<script>alert('data petugas berhasil di hapus');
            document.location.href= 'data-petugas.php';
            </script>";
        }else{
            echo mysqli_errno(self::connection());
        }
    }
}