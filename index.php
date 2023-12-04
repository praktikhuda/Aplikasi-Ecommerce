<!-- HEADER -->
<?php require __DIR__."/frondend/header.php"; ?>

<!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="image/1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="image/2.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="image/3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

<!-- PRODUK -->
    <div class="container" style="padding-top:25px; margin-bottom:100px">
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


<!-- FOOTER -->
<?php require __DIR__."/frondend/footer.php"; ?>