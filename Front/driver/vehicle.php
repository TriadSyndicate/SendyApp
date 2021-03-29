<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Weeb v4.12.4, Weeb.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="../assets/images/mbr-122x195.png" type="image/x-icon">
    <meta name="description" content="">


    <title>Vehicle Register | Deliveryy App</title>
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
    <link rel="stylesheet" href="../tel-build/css/intlTelInput.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <section class="mbr-section form1 cid-sr3zdiULRq" id="form1-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="title col-12 col-lg-8">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                        Register for Deliveryy as Driver</h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                        Sign Up using Email, Username &amp; Phone Number</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-12 " data-form-type="formoid">
                    <form action="" method="POST" class="mbr-form form-with-styler">
                        <div class="container">
                            <div class="row" style="margin:0 0 0 0;">
                                <div class="col-lg-6" id="left">
                                    <div class="row">
                                        <div class="col-md-3  form-group" data-for="name">
s

                                            <select name="cars" id="cars">
                                                <option value="volvo">Volvo</option>
                                                <option value="saab">Saab</option>
                                                <option value="mercedes">Mercedes</option>
                                                <option value="audi">Audi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-left:0%;" id="right">
                                    <div data-for="password" class="col-md-4  form-group">
                                        <label for="password" class="form-control-label mbr-fonts-style display-7">Password</label>
                                        <input type="password" name="password" data-form-field="password" class="form-control display-7" id="password">
                                    </div>
                                    <div data-for="password" class="col-md-4  form-group">
                                        <label for="confirmPassword" class="form-control-label mbr-fonts-style display-7">Confirm Password</label>
                                        <input type="password" name="confirmPassword" data-form-field="password" class="form-control display-7" id="confirmPassword">
                                    </div>
                                    <div>
                                        <label>Upload Image File:</label><br />
                                        <input type='file' name="file" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png" />
                                        <img id="blah" src="#" alt="your image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 input-group-btn align-center">
                            <button type="submit" id="signUpBTNDriver" class="btn btn-secondary btn-form display-4">Driver Sign Up</button>
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
    <script src="../tel-build/js/intlTelInput.js"></script>
    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            // any initialisation options go here
            autoHideDialCode: false,
            separateDialCode: true,
            initialCountry: "KE",
            utilsScript: "../tel-build/js/utils.js",
        });
        $(document).ready(function() {
            function alertSweet(message, type, title) {
                Swal.fire({
                    icon: `${type}`,
                    title: `${title}`,
                    text: `${message}`
                })
            }
            console.log('doc ready');
            $("#signUpBTNDriver").on('click', function(e) {
                e.preventDefault();
                console.log('alert1');
                var firstName = $("#firstName").val();
                var lastName = $("#lastName").val();
                var phone = $("#phone").val();
                var email = $("#email").val();
                var confirmPassword = $("#confirmPassword").val();
                var password = $("#password").val();

                if (firstName == "") {
                    alertSweet('Input first Name', 'error', 'Missing Input');
                    return false;
                } else if (lastName == "") {
                    alertSweet('Input Last Name', 'error', 'Missing Input');
                    return false;
                } else if (phone == "") {
                    alertSweet('Input phone number', 'error', 'Missing Input');
                    return false;
                } else if (email == "") {
                    alertSweet('Input valid email', 'error', 'Missing Input');
                    return false;
                } else if (confirmPassword == "") {
                    alertSweet('Input confirm password field', 'error', 'Missing Input');
                    return false;
                } else if (password == "") {
                    alertSweet('Input password', 'error', 'Missing Input');
                    return false;
                } else if (password !== confirmPassword) {
                    alertSweet('Passwords Do not Mach', 'error', 'Password Error');
                    return false;
                } else {
                    console.log('alert2');
                    $.post("req.php",
                        //JS Object to be posted to the orders.php file
                        {
                            firstName: firstName,
                            lastName: lastName,
                            email: email,
                            phone: phone,
                            password: confirmPassword,
                            type: 'driverSignUp',
                            role: 'DRIVER'
                        },
                        //Callback
                        function(result) {
                            var p = JSON.parse(result);
                            console.log(result);
                            //alert(p.response);
                            if (p.response == "ok") {
                                alertSweet('Successfully Signed Up as Driver', 'success', `Welcome ${firstName}`);
                            } else if (p.response == "error") {
                                alertSweet('That email already exists', 'error', 'Failed');
                            }
                        });
                }
            });
        });
    </script>
</body>

</html>