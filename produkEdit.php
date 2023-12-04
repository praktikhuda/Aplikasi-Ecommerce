<!-- HEADER -->
<?php require __DIR__."/frondend/header.php"; ?>

<?php foreach($db->keranjang($_SESSION["id"]) as $data){ ?>
    <div class="container">
        <div class="card mb-3" style="max-width: full;">
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
    </div>
    
<?php } ?>

<!-- FOOTER -->
<?php require __DIR__."/frondend/footer.php"; ?>