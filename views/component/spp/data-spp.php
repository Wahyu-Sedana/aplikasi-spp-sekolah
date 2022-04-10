<?php include_once '../../../utils/processing.php';?>
<?php include_once '../templates/sidebar.php'?>
<?php include_once '../templates/navbar.php';

if(isset($_GET['id_spp'])){
    Spp::hapusSpp($_GET['id_spp']);
}

?>


 <!-- Begin Page Content -->
 <div class="container-fluid">
                     <!-- Page Heading -->
                 <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data SPP</h1>
                        <a href="tambah-spp.php" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                    </div>
                    <table class="table table-hover">
                        <thead class="thead-dark shadow-sm p-3 mb-5 bg-white rounded">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Nominal</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $lihat =  Databases::fetchAll("SELECT * FROM tb_spp");
                        $no = 1;
                        if(isset($_POST['submit'])){
                            Spp::editSpp($_POST);
                        }
                        
                            foreach($lihat as $l){

                        ?>
                        <tbody class="shadow-sm p-3 mb-5 bg-white rounded">
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?php echo $l['tahun'];?></td>
                                <td><?php echo $l['nominal'];?></td>
                                <td class="text-center"><a href="" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $l['id_spp'] ?>"><i class="fas fa-fw fa-pencil-alt"></i></a>
                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal<?= $l['id_spp'] ?>"><i class="fas fa-fw fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                       
                        <!-- Modal -->
                        <div class="modal fade" id="editModal<?= $l['id_spp'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Spp</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                    <form method="post" class="">
                                    <div class="form-group">
                                        <input type="hidden" name="id_spp" value="<?= $l['id_spp']?>" class="form-control">
                                        <label>Tahun Ajaran</label>
                                        <input type="text" name="tahun" class="form-control" placeholder="Tahun Ajaran..." required value="<?= $l['tahun']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nominal</label>
                                        <input type="text" name="nominal" class="form-control" placeholder="Nominal..." equired value="<?= $l['nominal']?>">
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit" name="submit">Simpan</button>
                                </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Hapus Data-->
                        <div class="modal fade" id="hapusModal<?= $l['id_spp']?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Yakin anda inngin menghapus data spp tahun <?= $l['tahun']?> ?</p>
                                            <a href="?id_spp=<?= $l['id_spp']?>" class="btn btn-primary btn-block">Hapus</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                        <?php } ?>
                    </table>
                </div>
                <!-- /.container-fluid -->
                <?php include_once '../templates/footer.php'?>