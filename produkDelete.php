<!-- HEADER -->
<?php require __DIR__."/frondend/header.php"; ?>

<div style="margin-top:100px">
<p>aku</p>
</div>
<?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }

    $db->deleteKeranjang($id);
?>

<!-- FOOTER -->
<?php require __DIR__."/frondend/footer.php"; ?>