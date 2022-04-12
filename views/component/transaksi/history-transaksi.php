<?php include_once '../../../utils/processing.php';?>
<?php include_once '../templates/sidebar.php'?>
<?php include_once '../templates/navbar.php'?>

<?php

$bulan = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'
];
?>  
<!-- Begin Page Content -->
<div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">History Transaksi</h1>
                                <!-- Topbar Search -->
                                <?php
                                
                                if($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas'){

                                ?>
                        <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">#</th>
                                            <th scope="col">Nisn</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Tanggal Bayar</th>
                                            <th scope="col">Bulan diBayar</th>
                                            <th scope="col">Tahun diBayar</th>
                                            <th scope="col">Nominal</th>
                                            <th scope="col">Petugas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $lihat = Databases::query("SELECT * FROM history");
                                        $no = 1;
                                            foreach($lihat as $l){

                                        ?>
                                        <tr class="text-center">
                                            <th scope="row"><?php echo $no++; ?></th>
                                            <td><?php echo $l['nisn'];?></td>
                                            <td><?php echo $l['nama'];?></td>
                                            <td><?php echo $l['tgl_bayar'];?></td>
                                            <td><?php echo $bulan[$l['bulan_dibayar']];?></td>
                                            <td><?php echo $l['tahun_dibayar'];?></td>
                                            <td><?php echo $l['nominal'];?></td>
                                            <td><?php echo $l['nama_petugass'];?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                        </div>
                        <?php } else {?>
                            <div class="row">
                                <?php 
                                
                                $data = Pembayaran::fetch("SELECT * FROM tb_siswa WHERE nisn = '{$_SESSION['username']}'");
                                $data1 = Pembayaran::fetchAll("SELECT * FROM tb_pembayaran WHERE nisn ='{$_SESSION['username']}'");
                                $data2 = Pembayaran::fetch("SELECT *, COUNT(nisn) AS jumlah FROM tb_pembayaran WHERE nisn ='{$_SESSION['username']}'")

                                ?>
                                 <?php foreach($data1 as $key => $value) :?>
                                    <div class="col-lg-4">
                                     <div class="card shadow mb-4">
                                         <div class="card-body">
                                             <h4 class="text-center font-weight-bold"><?php echo $bulan[$value['bulan_dibayar']]?></h4>
                                             <hr>
                                             <h6 class="text-center font-weight-bold" style="line-height: 75px; text-align:center;">Lunas <button class="btn-success btn-circle" disabled><i class="fas fa-fw fa-check"></i></button></h6>
                                         </div>
                                     </div>
                                 </div>
                                 <?php endforeach;?>
                                 <?php 
                                  if($data2['jumlah'] <= 12) { 
                                    $jumlah = $data2['jumlah'] + 1;
                                    for($i = $jumlah; $i <= 12; $i++) :?>
                                    <div class="col-lg-4">
                                     <div class="card shadow mb-4">
                                         <div class="card-body">
                                             <h4 class="text-center font-weight-bold"><?php echo $bulan[$i]?></h4>
                                             <hr>
                                             <h6 class="text-center font-weight-bold" style="line-height: 75px; text-align:center;">Belum <button class="btn-danger btn-circle" disabled><i class="fas fa-fw fa-times"></i></button></h6>
                                         </div>
                                     </div>
                                 </div>
                                 <?php endfor; }?>
                            </div>
                        <?php }?>
                <!-- /.container-fluid -->
                <?php include_once '../templates/footer.php'?>