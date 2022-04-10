<?php

class Kelas extends Databases{

    // tambah data kelas
    public static function createKelas($post){
        $nama_kelas = $post['nama_kelas'];
        $kompetensi_keahlian = $post['kompetensi_keahlian'];
        
        $dataKelas = self::fetch("SELECT * FROM tb_kelas WHERE nama_kelas='$nama_kelas' AND kompetensi_keahlian='$kompetensi_keahlian'");
        if($dataKelas){
            echo '<script>alert("data kelas yang anda masukkan sudah terdaftar")</script>';
            return false;
        }

        $kelas = self::query("INSERT INTO tb_kelas VALUES(null, '$nama_kelas', '$kompetensi_keahlian')");
        if($kelas){
            echo '<script>alert("data kelas berhasil di tambahkan")</script>';
        }else{
            echo mysqli_errno(self::connection());
        }
    }

    // edit kelas
    public static function editKelas($post){
        $id_kelas = $post['id_kelas'];
        $nama_kelas = $post['nama_kelas'];
        $kompetensi_keahlian = $post['kompetensi_keahlian'];

        $dataKelas = self::query("UPDATE tb_kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$id_kelas'");
        if($dataKelas){
            echo "<script>alert('data kelas berhasil di perbaharui');
            document.location.href= 'data-kelas.php';
            </script>";
        }else{
            echo mysqli_errno(self::connection());
        }
    }

    // hapus kelas
    public static function hapusKelas($get){
        $id_kelas = $get;

        $dataKelas = self::fetch("SELECT * FROM tb_kelas WHERE id_kelas='$id_kelas'");
        $dataSiswa = self::fetch("SELECT * FROM tb_siswa WHERE id_kelas='$id_kelas'");

        if($dataSiswa['id_kelas'] == $dataKelas['id_kelas']){
            echo "<script>alert('data kelas ini sedang di gunakan di siswa');
            document.location.href= 'data-kelas.php';
            </script>";
            return false;
        }else{
            $hapusKelas = self::query("DELETE FROM tb_kelas WHERE id_kelas='$id_kelas'");
            if($hapusKelas){
                echo "<script>alert('data kelas berhasil di hapus');
                document.location.href= 'data-kelas.php';
                </script>";
            }else{
                echo mysqli_errno(self::connection());
            }
        }
    }
}