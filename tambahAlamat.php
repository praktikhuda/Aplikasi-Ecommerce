<!-- HEADER -->
<?php require __DIR__."/frondend/header.php"; ?>
    <?php
            if(isset($_POST["sub"])){
                $id = $_SESSION["id"];
                $nama = $_POST["nama"];
                $no = $_POST["no"];
                $kab = $_POST["kab"];
                $al = $_POST["al"];
                $db->tambahAlamat($id, $nama, $no, $kab, $al);
            }
            
        ?>

    <div class="container" style="padding-top:100px">
    <h2>TAMBAH ALAMAT</h2><hr>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nomer Hp</label>
            <input type="number" name="no" class="form-control" id="exampleFormControlInput1" placeholder="Nomer HandPhone or Telepon">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Kabupaten</label>
            <select class="form-select" name="kab" aria-label="Large select example">
                <option selected>Pilih Kabupaten</option>
                <option value="solo">Solo</option>
                <option value="yogyakarta">Yogyakarta</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <input type="text" name="al" class="form-control" id="exampleFormControlInput1" placeholder="Alamat Lengkap">
        </div>
        <div class="d-grid gap-2">
            <input type="submit" value="TAMBAH" class="btn btn-primary" name="sub">
        </div>
        </form>
    </div>

<!-- FOOTER -->
<?php require __DIR__."/frondend/footer.php"; ?>