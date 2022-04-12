<?php include_once '../../../utils/processing.php';?>
<?php include_once '../templates/sidebar.php'?>
<?php include_once '../templates/navbar.php'?>

<?php

$bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
?>

<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Riwayat Pembayaran</h1>

            <div class="card shadow mb-4">
                <div class="card-body">
                <a href="cetak.php" type="button" class="btn btn-primary mb-3" target="blank"><i class="fas fa-print"></i> Cetak</a>
                    <div class="table-responsive">
                        <table class=" table table-bordered" id="dataTable">
                            <thead>
                                <tr class="text-center">
                                    <th>Nisn</th>
                                    <?php foreach($bulan as $b) : ?>
                                        <th><?= $b ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $data = Pembayaran::fetchAll("SELECT * FROM tb_siswa");

                                    foreach($data as $d) :
                                        $data2 = Pembayaran::fetchAll("SELECT * FROM tb_pembayaran WHERE nisn = '{$d['nisn']}'");
                                        $data3 = Pembayaran::fetch("SELECT *, COUNT(nisn) as jumlah FROM tb_pembayaran WHERE nisn = '{$d['nisn']}'");
                                ?>
                                <tr class="text-center">
                                    <td><?= $d['nisn']?></td>
                                    <?php foreach($data2 as $d) : ?>
                                        
                                        <td>
                                            <span class="badge badge-success"><i class="fas fa-check"></i></span>
                                        </td>
                                    <?php endforeach; ?>
                                        <?php 
                                            if($data3['jumlah'] <= 12) { 
                                            $jumlah = 12 - $data3['jumlah'];
                                            for($i = 1; $i <= $jumlah; $i++) :
                                        ?>
                                            <td>
                                                <span class="badge badge-danger"><i class="fas fa-times"></i></span>
                                            </td>
                                        <?php endfor; ?>
                                        <?php } ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>
<?php include_once '../templates/footer.php'?>