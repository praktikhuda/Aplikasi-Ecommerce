<!-- HEADER -->
<?php require __DIR__."/frondend/header.php"; ?>

    <?php 
    $id = 0;
        if(isset($_GET["id_produk"])){
            $id = $_GET["id_produk"];
        }

        if(isset($_POST["keranjang"])){
            $id_user = $_SESSION["id"];
            $id_produk = $_POST["id"];
            $qty = $_POST["stok"];
            $db->masukanKeranjang($id_user, $id_produk, $qty); 
        }
        // echo $id;

    ?>

    <!-- VIEW PRODUK -->
    <?php
        // if(isset($_GET["id_produk"]) )
    ?>
    <div class="container" style="padding-top:100px;">

        <div class="row">
            <div class="col=md-12">
                <h2>DETAIL PRODUK</h2>
            </div>
            <?php

                foreach($db->tampilProduk1($id) as $data){
            ?>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <img src="image/<?php echo $data['img'] ?>" class="card-img-top">
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h2><?php echo $data['nama'] ?></h2>
                        <h5><?php echo $data['harga'] ?></h5>
                        <hr>
                        <p><?php echo $data['des'] ?></p>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?id_produk=<?php echo $id?>" method="POST">
                            <p>Jumlah Barang <input type="number" name="stok" placeholder="0 - 10"></p>
                            <input type="hidden" value="<?php echo $data["id_produk"]; ?>" name="id">
                            <input type="submit" value="Beli Now" class="btn btn-primary">
                            <input type="submit" value="Masukan Keranjang" class="btn btn-outline-primary" name="keranjang">
                        </form>
                    </div>
                </div>
            </div>

            <?php
                }
            ?>
        </div>
    </div>


    <!-- PRODUK LAIN -->
    <div class="container" style="padding-top:25px; padding-bottom:100px">
        <h2>PRODUK LAIN</h2>
        <div class="row">
            
        <?php
            foreach($db->tampilProduk() as $data){
        ?>
            <div class="col-sm-3 mb-sm-4">
                <div class="card">
                    <img src="image/<?php echo $data['img']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['nama']?></h5>
                        <p class="card-text"><?php echo substr($data['des'], 0, 50)."...";?></p>
                        <a href="view.php?id_produk=<?php echo $data['id_produk'] ?>" class="btn btn-primary">Beli Now</a>
                    </div>
                </div>
            </div>

        <?php
            }
        ?>
        </div>
    </div>

<!-- FOOTER -->
<?php require __DIR__."/frondend/footer.php"; ?>