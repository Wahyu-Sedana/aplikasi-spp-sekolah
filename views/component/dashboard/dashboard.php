<?php include_once '../../../utils/processing.php';?>
<?php include_once '../templates/sidebar.php'?>
<?php include_once '../templates/navbar.php'?>

<!-- Begin Page Content -->
<div class="container-fluid">




<!-- Content Row -->
<div class="main-content">
    <center>
    <div class="video ">
                            <video autoplay loop muted style="width: auto;">
                                <source src="../../../assets//videos/video.mp4" type="video/mp4">
                            </video>
                        </div>

                        <div class="title-content mt-4" style="text-align: center;">
                            <h1>Selamat Datang <?= ucwords($_SESSION['username'])?></h1>
                            <h4>Anda Login Sebagai <?= ucwords($_SESSION['level'])?></h4>
                        </div>

                    </div>
    </center>
                

                    
                </div>
<!-- /.container-fluid -->

<?php include_once '../templates/footer.php';?>