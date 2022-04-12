<?php include_once '../../../utils/processing.php';?>
<?php

$bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard | <?php echo $_SESSION['username']; ?></title>

       <!-- Custom fonts for this template-->
       <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../vendor/datatables/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../../vendor/datatables/dataTables.bootstrap4.min.css">

</head>
<body >

<div class="container-fluid">

            <div class="card shadow mb-4">
                <div class="card-body">
                <a href="cetak.php" onclick="getLaporan()" type="button" class="btn btn-primary mb-3" target="blank"><i class="fas fa-print"></i> Cetak</a>
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
                                    
                                    $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                                    foreach($data as $d) :
                                        $data2 = Pembayaran::fetchAll("SELECT * FROM tb_pembayaran WHERE nisn = '{$d['nisn']}'");
                                        $data3 = Pembayaran::fetch("SELECT *, COUNT(nisn) as jumlah FROM tb_pembayaran WHERE nisn = '{$d['nisn']}'");
                                ?>
                                <tr class="text-center">
                                    <td><?= $d['nisn']?></td>
                                    <?php foreach($data2 as $d) : ?>
                                        
                                        <td>
                                            <span class="badge <?= 'badge-success' ?>"><i class="fas fa-check"></i></span>
                                        </td>
                                    <?php endforeach; ?>
                                        <?php 
                                            if($data3['jumlah'] <= 12) { 
                                            $jumlah = 12 - $data3['jumlah'];
                                            for($i = 1; $i <= $jumlah; $i++) :
                                        ?>
                                            <td>
                                                <span class="badge <?= 'badge-danger' ?>"><i class="fas fa-times"></i></span>
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

<script>
    function getLaporan(){
        window.print();
        
    }
</script>
    <!-- Bootstrap core JavaScript-->
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../assets/js/demo/datatables-demo.js"></script>
</body>
</html>

