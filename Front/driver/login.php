<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="../assets/images/mbr-122x195.png" type="image/x-icon">
    <meta name="description" content="">


    <title>Driver Login | Deliveryy App</title>
    <link rel="stylesheet" href="../assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../assets/socicon/css/styles.css">
    <link rel="stylesheet" href="../assets/dropdown/css/style.css">
    <link rel="stylesheet" href="../assets/tether/tether.min.css">
    <link rel="stylesheet" href="../assets/theme/css/style.css">
    <link rel="preload" as="style" href="../assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
</head>

<body>

    <?php include './navbar.php';
    if (isset($_SESSION['LoggedIn'])) {
        if ($_SESSION['role'] == 'CLIENT') {
            header("Location: ./login.php");
        }
        if ($_SESSION['role'] == 'DRIVER') {
            header("Location: ./index.php");
        }
    }
    ?>

    <section class="mbr-section form1 cid-sr3yJiKgyp" id="form1-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="title col-12 col-lg-8">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                        Sign In</h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                        Sign In using Email / Phone Number</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-12 " data-form-type="formoid">
                    <form action="" method="POST" class="mbr-form form-with-styler">
                        <div class="container" style="margin-left: auto; margin-right:auto;">
                            <div class="row">
                                <div class="col-md-4  form-group" data-for="email">
                                    <label for="email" class="form-control-label mbr-fonts-style display-7">Email</label>
                                    <input type="email" name="email" placeholder="email@example.com" data-form-field="Email" required="required" class="form-control display-7" id="email">
                                </div>
                            </div>
                            <div class="row">
                                <div data-for="password" class="col-md-4  form-group">
                                    <label for="password" class="form-control-label mbr-fonts-style display-7">Password</label>
                                    <input type="password" name="password" data-form-field="password" class="form-control display-7" placeholder="Password" id="password">
                                </div>
                            </div>

                            <div class="col-md-12 input-group-btn align-center">
                                <button type="submit" id="signInBTNDriver" class="btn btn-secondary btn-form display-4">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <?php include 'footer.php'; ?>

    <script src="../assets/web/assets/jquery/jquery.min.js"></script>
    <script src="../assets/popper/popper.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/smoothscroll/smooth-scroll.js"></script>
    <script src="../assets/dropdown/js/nav-dropdown.js"></script>
    <script src="../assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="../assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="../assets/tether/tether.min.js"></script>
    <script src="../assets/theme/js/script.js"></script>
    <script src="../assets/formoid/formoid.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="../assets/superscript.js"></script>


</body>

</html>