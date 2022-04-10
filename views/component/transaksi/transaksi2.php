<?php include_once '../../../utils/processing.php';?>
<?php include_once '../templates/sidebar.php'?>
<?php include_once '../templates/navbar.php'?>


<?php

if(isset($_POST['submit_transaksi'])){
    if($_POST['nisn'] == ""){
        echo "
            <script>
                document.location.href = 'transaksi.php'
            </script>
        ";
    }else{
        $explode_siswa = explode("-", "{$_POST['nisn']}");
        $ambil_siswa = Pembayaran::fetch("SELECT * FROM tb_siswa WHERE nisn = '{$explode_siswa[0]}'");
        $ambil_spp = Pembayaran::fetch("SELECT * FROM tb_spp WHERE id_spp = {$ambil_siswa['id_spp']}");
    }
}

if(isset($_POST['submit'])){
    Pembayaran::transaksi($_POST);
}

?>


<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800">Transaksi Pembayaran</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <h4 class="text-center mb-4">Transaksi</h4>
                <form class="shadow-sm p-3 mb-5 bg-white rounded" method="POST" action="">
                    <div class="form-group">
                    <label for="">Nisn</label>
                            <input type="text" name="nisn" class="form-control" value="<?= $_POST['nisn'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="text" name="tahun_dibayar" class="form-control" value="<?= $ambil_spp['tahun']?>" readonly>
                    </div>
                            <input type="hidden" name="id_spp" class="form-control" value="<?= $ambil_siswa['id_spp']?>" readonly>
                            <input type="hidden" name="nisn" class="form-control" value="<?= $explode_siswa[0] ?>" readonly>

                    <div class="form-group">
                            <select class="form-control" name="nominal" id="exampleKelas">
                                <option value="" selected>Pilih Opsi Pembayaran</option>
                                <?php
                                    $data = Pembayaran::fetchAll("SELECT * FROM tb_pembayaran WHERE nisn = '{$explode_siswa[0]}'");
                                    $data_bulan_dibayar = array_column($data, "bulan_dibayar");
                                    $bulan = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                                    $bulan_belum_bayar = array_values(array_diff($bulan, $data_bulan_dibayar));
                                    $no = 1;
                                    
                                    foreach($bulan_belum_bayar as $key => $values) : 
                                ?>
                                    <option value="<?= $no ?>-<?= $ambil_spp['nominal'] ?>"><?= $no ?> Bulan - <?= $ambil_spp['nominal'] * $no++ ?></option>
                                <?php endforeach;?>
                            </select>
                    </div>
        
                        <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <a href="transaksi.php" class="btn btn-secondary btn-control btn-block">
                                        <i class="fas fa-arrow-left"></i> &nbsp; Back
                                    </a>                                       
                                </div>
                                <div class="col-sm-6">
                                    <button name="submit" type="submit" class="btn btn-success btn-control btn-block">
                                        <i class="fas fa-plus"></i> &nbsp; Tambah
                                    </button>    
                                </div>  
                        </div>
                </form>
            </div>
        </div>
</div>

</div>


<?php include '../templates/footer.php';?>