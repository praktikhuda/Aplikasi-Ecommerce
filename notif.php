<!-- HEADER -->
<?php require __DIR__."/frondend/header.php"; ?>
<div class="container" style="padding-top:100px;">
    <?php
      foreach($db->notif($_SESSION["id"]) as $data){
echo $data["status"];
      }
    ?>


</div>



<!-- FOOTER -->
<?php require __DIR__."/frondend/footer.php"; ?>