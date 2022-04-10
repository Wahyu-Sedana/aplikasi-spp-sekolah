<?php include_once '../../../utils/processing.php';?>
<?php include_once '../templates/sidebar.php'?>
<?php include_once '../templates/navbar.php'?>
<!-- Begin Page Content -->
<div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">History Transaksi</h1>
                                <!-- Topbar Search -->
                                <?php
                                
                                if(isset($_POST['cari'])){
                                    $cari = $_POST['cari'];
                                    $data = Databases::fetch("SELECT * FROM tb_siswa INNER JOIN tb_spp ON tb_siswa.id_spp=tb_spp.id_spp INNER JOIN tb_pembayaran ON tb_siswa.nisn=tb_pembayaran.nisn INNER JOIN tb_petugas ON tb_pembayaran.id_petugas=tb_petugas.id_petugas WHERE nisn LIKE '%". $cari ."%'");
                                }
                                
                                ?>
                    <form action="" method="post"
                        class="d-none d-sm-inline-block shadow-sm navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" name="cari" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" value="cari">
                                   
                                </input>
                            </div>
                        </div>
                    </form>
                    </div>
                    <table class="table table-hover">
                        <thead class="thead-dark shadow-sm p-3 mb-5 bg-white rounded">
                            <tr>
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
                        <?php
                        $lihat = Databases::query("SELECT * FROM tb_siswa INNER JOIN tb_spp ON tb_siswa.id_spp=tb_spp.id_spp INNER JOIN tb_pembayaran ON tb_siswa.nisn=tb_pembayaran.nisn INNER JOIN tb_petugas ON tb_pembayaran.id_petugas=tb_petugas.id_petugas");
                        $no = 1;
                            foreach($lihat as $l){

                        ?>
                        <tbody class="shadow-sm p-3 mb-5 bg-white rounded">
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?php echo $l['nisn'];?></td>
                                <td><?php echo $l['nama'];?></td>
                                <td><?php echo $l['tgl_bayar'];?></td>
                                <td><?php echo $l['bulan_dibayar'];?></td>
                                <td><?php echo $l['tahun_dibayar'];?></td>
                                <td><?php echo $l['nominal'];?></td>
                                <td><?php echo $l['nama_petugass'];?></td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
                <!-- /.container-fluid -->
                <?php include_once '../templates/footer.php'?>