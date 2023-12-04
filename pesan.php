<!-- HEADER -->
<?php require __DIR__."/frondend/header.php"; ?>



    <div class="container" style="padding-top:100px; padding-bottom:100px;">

    <?php
        foreach($db->viewPesanan($_SESSION["id"]) as $data){
    ?>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="image/<?php echo $data["bukti"] ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Rp. <?php echo number_format($data["total_harga"], 2) ?></h5>
                    <p class="card-text"><?php echo $data["nama"] ?> | <?php echo $data["no_hp"] ?><br><?php echo $data["alamat"] ?> | <?php echo $data["kabupaten"] ?></p>

                    <?php
                        if($data["bukti"] == "no"){
                    ?>
                    <a href="beliSekarang.php?id=<?php echo $db->cekPesan();?>" class="btn btn-primary">Upload Bukti Pembayaran</a>
                    <?php
                        }else{
                    ?>
                        <h5 class="card-title">Pesanan</h5>
                        <p class="card-text">
                            <?php 
                                if($data["status"] == "kemas"){
                                    echo "Barang Sedang Dikemas";
                                }else if($data["status"] == "kirim"){
                                    echo "Barang Sedang Dikirim";
                                }else{
                                    echo "Barang Telah Sampai di Tujuan";
                                }
                            ?>
                        </p>
                    <?php
                        }
                    ?>
                </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
<!-- FOOTER -->
<?php require __DIR__."/frondend/footer.php"; ?>