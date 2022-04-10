<?php include_once '../../../utils/processing.php';?>
<?php include_once '../templates/sidebar.php'?>
<?php include_once '../templates/navbar.php';

if(isset($_GET['id_kelas'])){
    Kelas::hapusKelas($_GET['id_kelas']);
}

?>
 <!-- Begin Page Content -->
                <div class="container-fluid">
                     <!-- Page Heading -->
                 <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kelas</h1>
                        <a href="tambah-kelas.php" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                    </div>
                    <table class="table table-hover">
                        <thead class="thead-dark shadow-sm p-3 mb-5 bg-white rounded">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Kompetensi Keahlian</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $lihat = Kelas::fetchAll("SELECT * FROM tb_kelas");
                        $no = 1;
                            foreach($lihat as $l){

                        ?>
                        <tbody class="shadow-sm p-3 mb-5 bg-white rounded">
                            <tr>
                                <th scope="row"><?php echo $no++;?></th>
                                <td><?php echo $l['nama_kelas'];?></td>
                                <td><?php echo $l['kompetensi_keahlian'];?></td>
                                <td class="text-center"><a href="" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $l['id_kelas']?>" ><i class="fas fa-fw fa-pencil-alt"></i></a>
                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal<?= $l['id_kelas']?>" ><i class="fas fa-fw fa-trash-alt"></i></a></td>
                            </tr>
                        </tbody>
                        
                        <!--edit Modal -->
                        <?php

                            if(isset($_POST['submit'])){
                                Kelas::editKelas($_POST);
                            }

                        ?>
                        <div class="modal fade" id="editModal<?= $l['id_kelas']?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Kelas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                    <form method="post" class="">
                                    <input type="hidden" name="id_kelas" class="form-control" placeholder="Enter Username" required value="<?= $l['id_kelas'];?>">
                                        <div class="form-group">
                                            <label>Nama kelas</label>
                                            <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas..." required value="<?= $l['nama_kelas'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Kompetensi Keahlian</label>
                                            <input type="text" name="kompetensi_keahlian" class="form-control" placeholder="Kompetensi keahlian..." required value="<?= $l['kompetensi_keahlian'];?>">
                                        </div>
                                        <button class="btn btn-primary btn-block" type="submit" name="submit">Simpan</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hapus Modal -->
                        <div class="modal fade" id="hapusModal<?= $l['id_kelas']?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Yakin ingin menghapus data kelas <?= $l['nama_kelas']?> ?</p>
                                    <a href="?id_kelas=<?= $l['id_kelas']?>" class="btn btn-primary btn-block">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </table>
                </div>
                <!-- /.container-fluid -->
                <?php include_once '../templates/footer.php'?>