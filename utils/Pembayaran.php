<?php

class Pembayaran extends Databases{
    // entri pembayaran
    public static function transaksi($post){
        $id_petugas = $_SESSION['id'];
        $nisn = $post['nisn'];
        $tahun_dibayar = $post['tahun_dibayar'];
        $id_spp = $post['id_spp'];  
        $tgl_bayar = date("Y-m-d");

        $explode_nominal = explode("-", "{$post['nominal']}"); 

        $bulan_dibayar = $explode_nominal[0];
        $nominal = $explode_nominal[1];

        $result = self::query("SELECT * FROM tb_pembayaran WHERE nisn = '$nisn'");

        if(mysqli_num_rows($result) == 0){
            for($i = 1; $i <= $bulan_dibayar; $i++){
                $result2 = self::query("INSERT INTO tb_pembayaran VALUES(null, '$id_petugas', '$nisn', '$tgl_bayar', '$i', '$tahun_dibayar', '$id_spp' , '$nominal')");

                if($result2){
                    echo "
                        <script>
                            alert('Transaksi Berhasil, silahkan cek kembali data tersebut');
                            document.location.href = '../transaksi/history-transaksi.php';
                        </script>
                    ";
                }
            }
        }else{
            $result3 = self::fetchAll("SELECT * FROM tb_pembayaran WHERE nisn = '$nisn'");
            $data_bulan_dibayar = array_column($result3, "bulan_dibayar");
            $bulan = ['1','2','3','4','5','6','7','8','9','10','11','12'];
            $bulan_belum_bayar = array_values(array_diff($bulan, $data_bulan_dibayar));

            for($i = 1; $i <= $bulan_dibayar; $i++){
                $bulan_dibayar2 = $bulan_belum_bayar[$i - 1];
                $result2 = self::query("INSERT INTO tb_pembayaran VALUES(null, '$id_petugas', '$nisn', '$tgl_bayar', '$bulan_dibayar2', '$tahun_dibayar', '$id_spp' , '$nominal')");
                if($result2){
                    echo "
                        <script>
                            alert('Transaksi Berhasil, silahkan cek kembali data tersebut');
                            document.location.href = '../transaksi/history-transaksi.php';
                        </script>
                    ";
                }
            }
            
        }
    }
}