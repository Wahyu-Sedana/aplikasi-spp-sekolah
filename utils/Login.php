<?php

class Login extends Databases{
    public static function loginUser($username, $password){
        
        $siswa = self::fetch("SELECT * FROM tb_siswa WHERE nisn='$username' AND nis='$password'");
        $petugas = self::fetch("SELECT * FROM tb_petugas WHERE username='$username' AND password='$password'");

        if($siswa == true){
            if($siswa['nisn'] == $username && $siswa['nis'] == $password){
                $_SESSION['username'] = $siswa['nisn'];
                $_SESSION['level'] = 'siswa';
                $_SESSION['login'] = true;
                header('location: views/component/dashboard/dashboard.php');
            }
        }else if($petugas == true){
            if($petugas['username'] == $username && $petugas['password'] == $password){
                $_SESSION['username'] = $petugas['username'];
                $_SESSION['level'] = $petugas['level'];
                $_SESSION['id'] = $petugas['id_petugas'];
                $_SESSION['login'] = true;
                header('location: views/component/dashboard/dashboard.php');
            }
        }else{
            echo mysqli_errno(self::connection());
        }
    }

    public static function logOut(){
        session_destroy();
    }
}