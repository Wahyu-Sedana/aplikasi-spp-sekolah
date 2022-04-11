<?php include_once '../../../utils/processing.php'; ?>
<?php include_once '../templates/sidebar.php' ?>
<?php include_once '../templates/navbar.php'; 

if(isset($_GET['nisn'])){
    Siswa::hapusSiswa($_GET['nisn']);
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Siswa</h1>
        <a href="tambah-siswa.php" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nisn</th>
                <th scope="col">Nis</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Kompetensi Keahlian</th>
                <th scope="col">Tahun</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
            <tbody>
            <?php
                $no = 1;
                $lihat = Databases::fetchAll("Call data_siswa()");
                $lihat1 = Databases::fetchAll("SELECT * FROM tb_spp");
                $lihat2 = Databases::fetchAll("SELECT * FROM tb_kelas");

                if(isset($_POST['submit'])){
                    Siswa::editSiswa($_POST);
                }

                foreach ($lihat as $l) {

                ?>
                <tr class="text-center">
                    <th scope="row"> <?php echo $no++; ?></th>
                    <td><?php echo $l['nisn']; ?></td>
                    <td><?php echo $l['nis']; ?></td>
                    <td><?php echo $l['nama']; ?></td>
                    <td><?php echo $l['nama_kelas']; ?></td>
                    <td><?php echo $l['kompetensi_keahlian']; ?></td>
                    <td><?php echo $l['tahun']; ?></td>
                    <td class="text-center"><a href="" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $l['nisn'] ?>"><i class="fas fa-fw fa-pencil-alt"></i></a>
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal<?= $l['nisn'] ?>"><i class="fas fa-fw fa-trash-alt"></i></a>
                    </td>
                </tr>
                 <!--Tambah Siswa-->
            <div class="modal fade" id="editModal<?= $l['nisn']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="" action="">
                                <div class="form-group">
                                    <label>Nisn</label>
                                    <input type="hidden" name="nisn" id="" class="form-control">
                                    <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Enter Nisn" value="<?= $l['nisn'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nis</label>
                                    <input type="text" name="nis" id="nis" class="form-control" placeholder="Enter Nis" value="<?= $l['nis'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Enter Nama Siswa" value="<?= $l['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <select name="id_kelas" id="id_kelas" class="form-control" type="text">
                                        <option value="">
                                            Nama Kelas
                                        </option>
                                        <?php

                                        foreach ($lihat2 as $dk) {

                                        ?>
                                            <option value="<?= $dk['id_kelas']; ?>" <?= $dk['nama_kelas'] == $l['nama_kelas'] ? 'selected':''?>>
                                                <?= $dk['nama_kelas'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Enter Alamat" value="<?= $l['alamat'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>No Telpon</label>
                                    <input type="text" name="no_telp" class="form-control" placeholder="Enter No Telpon" value="<?= $l['no_telp'] ?>">
                                </div>
                                <div class="form-group">
                                    <select name="id_spp" id="id_spp" class="form-control" type="text">
                                        <option value="">
                                            Tahun Ajaran
                                        </option>
                                        <?php
                                        foreach ($lihat1 as $da) :

                                        ?>
                                            <option value="<?= $da['id_spp']; ?>" <?= $da['tahun'] == $l['tahun'] ? 'selected' : ''?>><?= $da['tahun']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit" name="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Hapus Modal -->
             <div class="modal fade" id="hapusModal<?= $l['nisn']?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Yakin ingin menghapus data siswa <?= $l['nama']?> ?</p>
                                    <a href="?nisn=<?= $l['nisn']?>" class="btn btn-primary btn-block">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
        <?php } ?>
            </tbody>
        </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include_once '../templates/footer.php' ?>