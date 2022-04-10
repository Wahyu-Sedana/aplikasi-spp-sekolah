<?php

class Siswa extends Databases{
    
    // tambah siswa
    public static function createSiswa($post){
        $nisn = $post['nisn'];
        $nis = $post['nis'];
        $nama = $post['nama'];
        $kelas = $post['id_kelas'];
        $alamat = $post['alamat'];
        $no_telp = $post['no_telp'];
        $id_spp = $post['id_spp'];

        $siswa = Databases::query("INSERT INTO tb_siswa VALUES('$nisn', '$nis', '$nama', '$kelas', '$alamat', '$no_telp', '$id_spp')");
        if($siswa){
            echo"<script>
            alert('data siswa berhasil di tambahkan');
            document.location.href= 'data-siswa.php';
            </script>";
        }else{
            echo mysqli_errno(self::connection());
        }
    }

    // edit siswa
    public static function editSiswa($post){
        $nisn = $post['nisn'];
        $nama = $post['nama'];
        $kelas = $post['id_kelas'];
        $alamat = $post['alamat'];
        $no_telp = $post['no_telp'];
        $id_spp = $post['id_spp'];
        
        $siswa = Databases::query("UPDATE tb_siswa SET nama='$nama', id_kelas='$kelas', alamat='$alamat', no_telp='$no_telp', id_spp='$id_spp' WHERE nisn='$nisn'");
        if($siswa){
            echo"<script>
            alert('data siswa berhasil di perbaharui');
            document.location.href= 'data-siswa.php';
            </script>";
        }else{
            echo mysqli_errno(self::connection());
        }
    }

    // hapus siswa
    public static function hapusSiswa($get){
        $nisn = $get;
        $siswa = Databases::query("DELETE FROM tb_siswa WHERE nisn='$nisn'");
        if($siswa){
            echo"<script>
            alert('data siswa berhasil di hapus');
            document.location.href= 'data-siswa.php';
            </script>";
        }else{
            echo mysqli_errno(self::connection());
        }
    }
}