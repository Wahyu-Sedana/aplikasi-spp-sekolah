<?php include_once '../../../utils/processing.php';?>
<?php include_once '../templates/sidebar.php'?>
<?php include_once '../templates/navbar.php'?>
<!-- Begin Page Content -->
<div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">History Transaksi</h1>
                                <!-- Topbar Search -->
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
                                            <td><?php echo $l['bulan_dibayar'];?></td>
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
                <!-- /.container-fluid -->
                <?php include_once '../templates/footer.php'?>