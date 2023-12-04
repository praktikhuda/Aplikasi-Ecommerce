<?php
    session_start();
    include "backend/backend.php";
    $db = new backend();
    
    if(isset($_POST["logout"])){
      $db->logout();
    }

    $a = 0;
    if(isset($_SESSION["lev"])){
        $a = 1;
    }

    $namaFile = $_SERVER['SCRIPT_FILENAME'];
    $currentPage = substr($namaFile, 1); 
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aplikasi Penjualan Ikan Hias</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <?php
            if($a == 1){
        ?>
        <!-- MENU SEBELUM LOGIN -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container">
                <img src="image/logo.webp" alt="logo" width="100" height="auto" class="navbar-brand">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($namaFile) == "index.php" ? "active" : "" ?>" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">PRODUK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($namaFile) == "keranjang.php" ? "active" : "" ?>" href="keranjang.php">KERANJANG <span class="badge bg-secondary"><?php echo $db->cekKeranjang($_SESSION["id"]); ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($namaFile) == "pesan.php" ? "active" : "" ?>" href="pesan.php">PESANAN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                <img src="image/notif.png" alt="notifikasi" style="width:20px;">
                            </a>
                        </li>
                    </ul>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"><input type="submit" name="logout" class="nav-link d-flex" value="LOGOUT"></form>
                </div>
            </div>
        </nav>

        <?php }else{ ?>

        <!-- MENU SESUDAH LOGIN -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <img src="image/logo.webp" alt="logo" width="100" height="auto" class="navbar-brand">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">PRODUK</a>
                        </li>
                    </ul>
                    <a href="login.php" class="nav-link d-flex">LOGIN</a>
                </div>
            </div>
        </nav>

        <?php } ?>



        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Notifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php
                    foreach($db->notif($_SESSION["id"]) as $data){
                        if($data["status"] == "no"){
                ?>
                <div class="card mb-3 text-bg-secondary">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="image/1.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data["judul"]; ?></h5>
                            <p class="card-text"><small class="text-body-primary">Last updated 3 mins ago</small></p>
                        </div>
                        </div>
                    </div>
                </div>
                
                <?php
                        }else{
                ?>

                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="image/1.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data["judul"]; ?></h5>
                            <p class="card-text"><small class="text-body-primary">Last updated 3 mins ago</small></p>
                        </div>
                        </div>
                    </div>
                </div>

                <?php
                        }
                    }
                ?>
            </div>
        </div>
