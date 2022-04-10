<?php include_once '../../../utils/processing.php'?>
<?php include_once '../templates/sidebar.php'?>
<?php include_once '../templates/navbar.php'?>


<?php

    

if(isset($_POST['submit'])){
    Siswa::createSiswa($_POST);
}


?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Siswa</h1>
</div>

<form method="post" class="shadow-sm p-3 mb-5 bg-white rounded" action="">
    <div class="form-group">
        <label>Nisn</label>
        <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Enter Nisn">
    </div>
    <div class="form-group">
        <label for="">Nis</label>
        <input type="text" name="nis" id="nis" class="form-control" placeholder="Enter Nis">
    </div>
    <div class="form-group">
        <label>Nama Siswa</label>
        <input type="text" name="nama" id="nama" class="form-control" placeholder="Enter Nama Siswa">
    </div>
    <div class="form-group">
        <select name="id_kelas" id="id_kelas" class="form-control" type="text">
            <option value="">
                Nama Kelas
            </option>
            <?php
            
            $lihat = Databases::fetchAll("SELECT * FROM tb_kelas");
            foreach($lihat as $d) {
            
            ?>
            <option value="<?= $d['id_kelas'];?>">
                <?php echo $d['nama_kelas']?>
            </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" placeholder="Enter Alamat">
    </div>
    <div class="form-group">
        <label>No Telpon</label>
        <input type="text" name="no_telp" class="form-control" placeholder="Enter No Telpon">
    </div>
    <div class="form-group">
        <select name="id_spp" id="id_spp" class="form-control" type="text">
            <option value="">
                Tahun Ajaran
            </option>
            <?php
              $lihat1 = Databases::fetchAll("SELECT * FROM tb_spp");
            foreach($lihat1 as $da) :
            
            ?>
           <option value="<?= $da['id_spp'];?>"><?= $da['tahun'];?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <a href="data-siswa.php" class="btn btn-secondary btn-control btn-block">
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
<!-- /.container-fluid -->
<?php include_once '../templates/footer.php'?>