<!-- HEADER -->
<?php require __DIR__."/frondend/header.php"; ?>

<?php


    if(isset($_POST["bayar"])){
        $id = $_POST["id_alamat"];
        $total = $_POST["totalHarga"];
        $db->pesan($id, $total);
    }

    $id= 0;
    if(isset($_GET["id"])){
        $id = $_GET["id"] + 1;
    }

    if (isset($_POST["unggah"])) {
        $targetDirectory = "image/";
        $targetFile = $targetDirectory . basename($_FILES["gambar"]["name"]);
        $id = $id-1;
        
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {

            $nama_file = basename($_FILES["gambar"]["name"]);

            $db->uploadBukti($id, $nama_file);

            header("Location: pesan.php");
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah gambar.";
        }
    }

?>

    <div class="container" style="padding-top:100px; padding-bottom:100px">
        <h2>Upload Bukti Pembayaran</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>?id=<?php echo $id-1?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="gambar" name="gambar">
            </div>
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary" value="Kirim" name="unggah">
            </div>
            </form>
    </div>
   


<!-- FOOTER -->
<?php require __DIR__."/frondend/footer.php"; ?>