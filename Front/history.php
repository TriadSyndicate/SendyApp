<?php
include './db.php';
session_start();
if (!isset($_SESSION['LoggedIn'])) {
    header("Location: login.php");
}else{
    if ($_SESSION['role'] == 'DRIVER') {
        header("Location: ./driver/index.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Yeet v4.12.4, Yeet.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/mbr-122x195.png" type="image/x-icon">
    <meta name="description" content="">


    <title>Client History | Deliveryy App</title>
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
    <link rel="stylesheet" href="tel-build/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        .cross {
            padding: 10px;
            color: #d6312d;
            cursor: pointer;
            font-size: 23px
        }

        .cross i {
            margin-top: -5px;
            cursor: pointer
        }

        .comment-box {
            padding: 5px
        }

        .comment-area textarea {
            resize: none;
            border: 1px solid red
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #fff;
            outline: 0;
            box-shadow: 0 0 0 1px red !important
        }

        .send {
            color: #fff;
            background-color: red;
            border-color: red
        }

        .send:hover {
            color: #fff;
            background-color: #f50202;
            border-color: #f50202
        }

        .rating {
            display: inline-flex;
            margin-top: -10px;
            flex-direction: row-reverse
        }

        .rating>input {
            display: none
        }

        .rating>label {
            position: relative;
            width: 28px;
            font-size: 35px;
            color: red;
            cursor: pointer
        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }

        .rating>input:checked~label:before {
            opacity: 1
        }

        .rating:hover>input:checked~label:before {
            opacity: .4
        }
    </style>
</head>

<body>
    <?php include './layouts/navbar.php'; ?>

    <section class="mbr-section form1 cid-sr3zdiULRq" id="form1-8">
        <div class="container mbr-fonts-style">
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-pending-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pending" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Pending</button>
                    <button class="nav-link" id="v-pills-enroute-tab" data-bs-toggle="pill" data-bs-target="#v-pills-enroute" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Enroute</button>
                    <button class="nav-link" id="v-pills-completed-tab" data-bs-toggle="pill" data-bs-target="#v-pills-completed" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Completed</button>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-pending" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="container">
                            <table id="pendingTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Start Point</th>
                                        <th>Ending Point</th>
                                        <th>Price</th>
                                        <th>Distance (KMs)</th>
                                        <th>Recipient</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM order_data WHERE user_id='$_SESSION[userid]' AND status='PENDING'";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        $cc = 0;
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            $cc = $cc + 1; ?><tr>
                                                <td><?php echo $cc; ?></td>
                                                <td><?php echo $row['origin']; ?></td>
                                                <td><?php echo $row['destination']; ?></td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['distance']; ?></td>
                                                <td><?php echo $row['recipient_name']; ?></td>
                                                <td><span class="badge bg-secondary text-white">AWAITING PICK-UP</span></td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Start Point</th>
                                        <th>Ending Point</th>
                                        <th>Price</th>
                                        <th>Distance</th>
                                        <th>Recipient</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-enroute" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="container">
                            <table id="enrouteTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Start Point</th>
                                        <th>Ending Point</th>
                                        <th>Price (KES)</th>
                                        <th>Distance (KMs)</th>
                                        <th>Driver</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM order_data WHERE user_id='$_SESSION[userid]' AND status='PICKED UP'";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        $cc = 0;
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $cc = $cc + 1; ?><tr>
                                                <td><?php echo $cc; ?></td>
                                                <td><?php echo $row['origin']; ?></td>
                                                <td><?php echo $row['destination']; ?></td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['distance']; ?></td>
                                                <td><?php $sqlmini = "SELECT * FROM user_data WHERE user_id='$row[driver_id]'";
                                                    $r = mysqli_query($conn, $sqlmini);
                                                    if (mysqli_num_rows($r) > 0) {
                                                        while ($rr = mysqli_fetch_assoc($r)) {
                                                            echo $rr['first_name'] . ' ' . $rr['last_name'].' => '.$rr['phone'];
                                                        }
                                                    } else {
                                                        echo "Error";
                                                    } ?></td>
                                                <td> <button data-toggle="modal" data-target="#form" onclick="completeTrip(<?php echo $row['order_id']; ?>,<?php echo $row['driver_id']; ?>)" class="btn btn-secondary btn-form display-4">Confirm Delivery</button> </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Start Point</th>
                                        <th>Ending Point</th>
                                        <th>Price</th>
                                        <th>Distance</th>
                                        <th>Driver</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="text-right cross"> <i class="fa fa-times mr-2"></i> </div>
                                        <div class="card-body text-center"> <img src=" https://i.imgur.com/d2dKtI7.png" height="100" width="100">
                                            <div class="comment-box text-center">
                                                <h4>Comment on the service</h4>
                                                <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label> </div>
                                                <div class="comment-area"> <textarea id="messageArea" class="form-control" placeholder="Message" rows="4"></textarea> </div>
                                                <div class="text-center mt-4"> <button onclick="superalert(<?php echo $_SESSION['selectedOrder']; ?>)" class="btn btn-success send px-5">Send message <i class="fa fa-long-arrow-right ml-1"></i></button> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-completed" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="container">
                            <table id="completedTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Start Point</th>
                                        <th>Ending Point</th>
                                        <th>Price</th>
                                        <th>Distance (KMs)</th>
                                        <th>Recipient</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM order_data WHERE user_id='$_SESSION[userid]' AND status='COMPLETED'";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        $cc = 0;
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            $cc = $cc + 1; ?><tr>
                                                <td><?php echo $cc; ?></td>
                                                <td><?php echo $row['origin']; ?></td>
                                                <td><?php echo $row['destination']; ?></td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['distance']; ?></td>
                                                <td><?php echo $row['recipient_name']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $conn->close();
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Start Point</th>
                                        <th>Ending Point</th>
                                        <th>Price</th>
                                        <th>Distance</th>
                                        <th>Recipient</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './layouts/footer.php'; ?>


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
    <script src="tel-build/js/intlTelInput.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pendingTable').DataTable();
            $('#enrouteTable').DataTable();
            $('#completedTable').DataTable();
            Swal({
                title: '<strong>HTML <u>example</u></strong>',
                type: 'info',
                html: 'You can use <b>bold text</b>, ' +
                    '<a href="//github.com">links</a> ' +
                    'and other HTML tags',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
                cancelButtonAriaLabel: 'Thumbs down',
            });
        });

        function superalert(id) {
            var msg = $('#messageArea').val()
            var rating = 0;
            if ($("#1:checked").length == 1) {
                rating = 1;
            }
            if ($("#2:checked").length == 1) {
                rating = 2;
            }
            if ($("#3:checked").length == 1) {
                rating = 3;
            }
            if ($("#4:checked").length == 1) {
                rating = 4;
            }
            if ($("#5:checked").length == 1) {
                rating = 5;
            }

            $.post("requests.php", {
                    orderID: id,
                    type: 'ratingPOST',
                    rating: rating,
                    comment: msg
                },
                //Callback
                function(result) {
                    var p = JSON.parse(result);
                    console.log(JSON.stringify(result));
                    //alert(p.response);
                    if (p.response == "ok") {
                        Swal.fire({
                            title: `<strong>${p.origin} => ${p.destination}</strong>`,
                            icon: 'success',
                            html: 'Thank You For using Deliveryy!' +
                                `Total: ${p.price} KES`,
                            focusConfirm: false,
                            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Complete!'
                        });

                    } else {
                        alertSweet('Failed, Try Again', 'error', 'Failed');
                    }
                });

        }

        function alertSweet(message, type, title) {
            Swal.fire({
                icon: `${type}`,
                title: `${title}`,
                text: `${message}`
            })
        }

        function completeTrip(orderID,driverID) {
            $.post("requests.php", {
                    orderID: orderID,
                    driverID:driverID,
                    type: 'confirmDelivery'
                },
                //Callback
                function(result) {
                    var p = JSON.parse(result);
                    console.log(result);
                    //alert(p.response);
                    if (p.response == "ok") {
                        console.log('okk')
                    } else {
                        alertSweet('Failed, Try Again', 'error', 'Failed');
                    }
                });
        }
    </script>
</body>

</html>