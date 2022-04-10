<?php include_once '../../../utils/processing.php';?>
<?php include_once '../templates/sidebar.php'?>
<?php include_once '../templates/navbar.php'?>

<?php

$ambil_siswa = Pembayaran::fetchAll("SELECT * FROM tb_siswa");

?>

<div class="container-fluid">

                <h1 class="h3 mb-3 text-gray-800">Transaksi Pembayaran</h1>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <h4 class="text-center mb-4">Pilih Nisn dan Nama Siswa</h4>
                            <form class="shadow-sm p-3 mb-5 bg-white rounded" method="POST" action="transaksi2.php">
                            <div class="form-group">
                                <label for="">Pilih Siswa</label>
                                <input name="nisn" id="" type="text" autocomplete="off" class="form-control form-control-sm" list="nisns" required>
                                <datalist id="nisns">
                                    <?php
                                    foreach ($ambil_siswa as $siswa) {
                                    ?>
                                        <option value="<?= "{$siswa["nisn"]}-{$siswa["nama"]}" ?>">
                                        <?php } ?>
                                </datalist>
                            </div>
                    
                                <button name="submit_transaksi" type="submit" class="btn btn-success btn-control btn-block">
                                                <i class="fas fa-arrow-right"></i> &nbsp; Next
                                            </button>    
                            </form>
                        </div>
                    </div>
                </div>
</div>

<?php include_once '../templates/footer.php'?>


