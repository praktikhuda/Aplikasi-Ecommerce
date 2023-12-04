<?php
    include "backend/backend.php";
    $db = new backend();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="frondend/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="frondend/css/style.css">
    <title>Aplikasi Penjualan</title>
</head>
<body>

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

       <div class="row border rounded-5 p-3 bg-white shadow box-area">


       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
           <div class="featured-image mb-3">
            <img src="images/1.png" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be Verified</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced Designers on this platform.</small>
       </div> 

        
       <div class="col-md-6 right-box">
            <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Hello,Again</h2>
                     <p>We are happy to have you back.</p>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email address" name="user">
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" id="password" name="pass">
                    </div>
                    <div class="input-group mb-5 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Show Password</small></label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" name="submit">Login</button>
                    </div>
                    <div class="row">
                        <small>Don't have account? <a href="#">Sign Up</a></small>
                    </div>
                </form>
            </div>
       </div> 

      </div>
    </div>
    <?php
        if(isset($_POST["submit"])){
            $user = $_POST["user"];
            $pass = md5($_POST["pass"]);
            $db->login($user, $pass);
        }
    ?>

    <script src="frondend/js/script.js"></script>
</body>
</html>