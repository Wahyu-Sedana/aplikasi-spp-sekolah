<?php

class Databases{
    private static $host = 'localhost';
    private static $user = 'root';
    private static $pass = '';
    private static $db = 'aplikasi_spp';
    public static function connection()
    {
        // membuat koneksi
        $conn = mysqli_connect(self::$host, self::$user, self::$pass, self::$db)or die(mysqli_connect_error());
        return $conn;
    }

    public static function query($query)
    {
        $conn = self::connection();
        $queryRun = mysqli_query($conn, $query) or die(mysqli_errno($conn));
        return $queryRun;  
    }

    public static function fetch($query){
        $query = self::query($query);
        $data = mysqli_fetch_assoc($query);
        return $data;
    }

    public static function fetchAll($query){
        $query = self::query($query);
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $data;
    }
}