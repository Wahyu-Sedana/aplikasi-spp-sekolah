<?php include_once '../../../utils/processing.php'?>
<?php include_once '../templates/sidebar.php'?>
<?php include_once '../templates/navbar.php'?>

<?php

if(isset($_POST['submit'])){
    Spp::createSpp($_POST);
}


?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Spp</h1>
                    </div>

                    <form method="post" class="shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="form-group">
                            <label>Tahun Ajaran</label>
                            <input type="text" name="tahun" class="form-control" placeholder="Tahun Ajaran...">
                        </div>
                        <div class="form-group">
                            <label>Nominal</label>
                            <input type="text" name="nominal" class="form-control" placeholder="Nominal...">
                        </div>
                        <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <a href="data-spp.php" class="btn btn-secondary btn-control btn-block">
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