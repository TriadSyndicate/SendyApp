<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Deliveryy App</title>
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/socicon/css/styles.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="layouts/tes.css">
</head>

<body>
    <?php include 'layouts/navbar.php'; ?>
    <br>

    <section class="mbr-section form1 cid-sr3zdiULRq" id="form1-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="title col-12 col-lg-8">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                        Welcome <?php echo $_SESSION['firstName']; ?>,</h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                        You can request a deliveryy down below</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-12 " data-form-type="formoid">
                    <form action="" method="POST" class="mbr-form form-with-styler">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12" id="right">
                                    <div class="row">
                                        <div class="col-md-12  form-group" data-for="email">
                                            <label for="startoff" class="form-control-label mbr-fonts-style display-7">Starting Point</label>
                                            <input type="text" name="startoff" required="required" class="form-control display-7" id="startoff">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div data-for="phone" class="col-md-12  form-group">
                                            <label for="endpoint" class="form-control-label mbr-fonts-style display-7">Drop-Off Point</label>
                                            <input type="text" name="endpoint" class="form-control display-7" id="endpoint">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 input-group-btn align-center">
                            <button type="submit" id="clientRequest" class="btn btn-warning btn-form display-4">Request Deliveryy</button>
                        </div>
                    </form>
                    <?php
    ?>
                </div>
            </div>
        </div>
    </section>
    <script src="layouts/tes.js"></script>
    <script>
        var counties = ["Mombasa",
            "Kwale",
            "Kilifi",
            "Tana River",
            "Lamu",
            "Taita-Taveta",
            "Garissa",
            "Wajir",
            "Mandera",
            "Marsabit",
            "Isiolo",
            "Meru",
            "Tharaka-Nithi",
            "Embu",
            "Kitui",
            "Machakos",
            "Makueni",
            "Nyandarua",
            "Nyeri",
            "Kirinyaga",
            "Murang'a",
            "Kiambu",
            "Turkana",
            "West Pokot",
            "Samburu",
            "Trans Nzoia",
            "Uasin Gishu",
            "Elgeyo-Marakwet",
            "Nandi",
            "Baringo",
            "Laikipia",
            "Nakuru",
            "Narok",
            "Kajiado",
            "Kericho",
            "Bomet",
            "Kakamega",
            "Vihiga",
            "Bungoma",
            "Busia",
            "Siaya",
            "Kisumu",
            "Homa Bay",
            "Migori",
            "Kisii",
            "Nyamira",
            "Nairobi",
        ];
        autocomplete(document.getElementById("startoff"), counties);
        autocomplete(document.getElementById("endpoint"), counties);
    </script>
    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/dropdown/js/nav-dropdown.js"></script>
    <script src="assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/theme/js/script.js"></script>
    <script src="assets/formoid/formoid.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="assets/superscript.js"></script>
</body>

</html>