<?php include_once '../../../utils/processing.php';?>
<?php include_once '../templates/sidebar.php'?>
<?php include_once '../templates/navbar.php';

if(isset($_GET['id_petugas'])){
    Petugas::hapusPetugas($_GET['id_petugas']);
}

?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Petugas</h1>
                        <a href="tambah-petugas.php" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                    </div>

                    <table class="table table-hover">
                        <thead class="thead-dark shadow-sm p-3 mb-5 bg-white rounded">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Nama Petugas</th>
                                <th scope="col">Level</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $lihat = Databases::fetchAll("SELECT * FROM tb_petugas");
                        $no = 1;
                            foreach ($lihat as $l) {

                        ?>
                                <tbody class="shadow-sm p-3 mb-5 bg-white rounded">
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $l['username']; ?></td>
                                        <td><?php echo $l['password']; ?></td>
                                        <td><?php echo $l['nama_petugass']; ?></td>
                                        <td><?php echo $l['level']; ?></td>
                                        <td class="text-center"><a href="" class="btn btn-info" data-toggle="modal" data-target="#editPetugas<?= $l['id_petugas']?>"><i class="fas fa-fw fa-pencil-alt"></i></a>
                                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#hapusPetugas<?= $l['id_petugas']?>"><i class="fas fa-fw fa-trash-alt"></i></a></td>
                                    </tr>
                                </tbody>
                                <!-- Edit Modal -->
                                <?php
                                
                                if(isset($_POST['submit'])){

                                    Petugas::editPetugas($_POST);
                                }
                                ?>
                                <div class="modal fade" id="editPetugas<?= $l['id_petugas']?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Petugas</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                            <form method="POST" class="">
                                            <input type="hidden" name="id_petugas" class="form-control" placeholder="Enter Username" required value="<?= $l['id_petugas'];?>">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="username" name="username" class="form-control" placeholder="Enter Username" required value="<?= $l['username'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control" placeholder="Password" required value="<?= $l['password'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama Petugas</label>
                                                        <input type="text" name="nama" class="form-control" placeholder="Enter Nama Petugas" required value="<?= $l['nama_petugass'];?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Role</label>
                                                        <select name="level" id="" class="form-control">
                                                            <option value="">
                                                                Pilih Role
                                                            </option>
                                                            <option value="admin">
                                                                admin
                                                            </option>
                                                            <option value="petugas">
                                                                petugas                                    
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-primary btn-block" type="submit" name="submit">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Hapus Data-->
                                <div class="modal fade" id="hapusPetugas<?= $l['id_petugas']?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Yakin anda inngin menghapus data <?= $l['nama_petugass']?> ?</p>
                                            <a href="?id_petugas=<?= $l['id_petugas']?>" class="btn btn-primary btn-block">Hapus</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                        <?php }
                                        ?>
                                    </table>
                                </div>
                                <!-- /.container-fluid -->
                
                
<?php include_once '../templates/footer.php'?>