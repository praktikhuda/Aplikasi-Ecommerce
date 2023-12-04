<!-- HEADER -->
<?php require __DIR__."/frondend/header.php"; ?>


    <!-- KERANJANG -->
    <div class="container" style="padding-top:100px; padding-bottom:150px">
        <form action="beliSekarang.php?id=<?php echo $db->cekPesan(); ?>" method="POST">

        <h2>Keranjang Belanja</h2><hr>
        <h5>Alamat Pengirim</h5>
        <table class="table">
            <thead>
                <th>Deskripsi</th>
                <th>Action</th>
            </thead>

            <?php
                foreach($db->lihatAlamat($_SESSION["id"]) as $data){
            ?>
            <tbody>
                <input type="hidden" name="id_alamat" value="<?php echo $data["id_alamat"] ?>">
                <td><?php echo $data["nama"] ?> | <?php echo $data["no_hp"] ?><br><?php echo $data["alamat"] ?> | <?php echo $data["kabupaten"] ?></td>
                <td>
                    <a href="produkEdit.php" class="btn btn-primary">EDIT</a>
                    <a href="produkDelete.php" class="btn btn-outline-primary">DELETE</a>
                </td>
            </tbody>

            <?php
                }
            ?>
            
        </table>
        <h5>Produk</h5>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php 
                if($db->keranjang($_SESSION["id"]) > 0){
            ?>
            
                <tbody>
                
                <?php
                    foreach($db->keranjang($_SESSION["id"]) as $data){
                        if(isset($_POST["edit"])){
                            header("Location: produk.php?id=".$data["id_keranjang"]);
                            exit();
                        }
                ?>
                <tr>
                    <td>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                <img src="image/<?php echo $data["img"];?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo ucfirst($data["nama"]);?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </td>
                    <td>Rp. <?php echo number_format($data["harga"], 2); ?></td>
                    <td>
                    <?php echo $data["qty"]; ?>
                    </td>
                    <td>
                        <a href="produkEdit.php?id=<?php echo $data["id_keranjang"]; ?>" class="btn btn-primary">EDIT</a>
                        <a href="produkDelete.php?id=<?php echo $data["id_keranjang"]; ?>" class="btn btn-outline-primary">DELETE</a>
                    </td>
                </tr>
            <?php
                    }
                }else{
            ?>
            <tbody>
                <td>Kosong</td>
            </tbody>
            
                <?php
                    }
                ?>
                <tr>
                    <td colspan="3">Sub Total</td>
                    <td>Rp. <?php echo number_format($db->totalHargaKenjang($_SESSION["id"]), 2);?></td>
                </tr>
                <tr>
                    <td colspan="3">Ongkir</td>
                    <td>Rp. 
                        <?php 
                            foreach($db->lihatAlamat($_SESSION["id"]) as $data){ 
                                if($data["kabupaten"] == "yogyakarta"){
                                    echo number_format(22000, 2);
                                }else if($data["kabupaten"] == "solo"){
                                    echo number_format(21000, 2);
                                }
                            } 
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">Total Belanja</td>
                    <td>Rp.
                        <?php 
                            $harga = 0;
                            foreach($db->lihatAlamat($_SESSION["id"]) as $data){
                                if($data["kabupaten"] == "yogyakarta"){
                                    $harga = 22000;
                                }else if($data["kabupaten"] == "solo"){
                                    $harga = 21000;
                                }
                            } 
                            $total = $db->totalHargaKenjang($_SESSION["id"]);
                            $totalAll = $harga + $total;
                            echo number_format($totalAll, 2);
                            echo "<input type='hidden' name='totalHarga' value='".$totalAll."'>";
                        ?>
                    </td>
                </tr>
                
            </tbody>
        </table>
        <div class="d-grid gap-2">
            <input type="submit" class="btn btn-primary" value="Bayar Sekarang" name="bayar">
        </div>
            
        

        </form>
    </div>

<!-- FOOTER -->
<?php require __DIR__."/frondend/footer.php"; ?>