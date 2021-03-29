<?php
include '../db.php';
session_start();
if (!isset($_SESSION['LoggedIn'])) {
    header("Location: ./driver/login.php");
}else{
    if ($_SESSION['role'] == 'CLIENT') {
        header("Location: ../login.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.12.4, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="../assets/images/mbr-122x195.png" type="image/x-icon">
    <meta name="description" content="">


    <title>Driver Home | Deliveryy App</title>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>

<body>
    <?php include './navbar.php'; ?>

    <section class="mbr-section form1 cid-sr3zdiULRq" id="form1-8">
        <div class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Pending Deliveries</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-enroute" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Ongoing</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-completed" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Completed</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-pending" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="container">
                        <table id="pendingTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Start Point</th>
                                    <th>Ending Point</th>
                                    <th>Price</th>
                                    <th>Distance (KMs)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM order_data WHERE status='PENDING'";
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
                                            <td> <button onclick="completeTrip(<?php echo $row['order_id']; ?>, <?php echo $_SESSION['userid']; ?>)" class="btn btn-secondary btn-form display-4">Pick-Up Delivery</button> </td>
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
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Price</th>
                                    <th>Distance</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-enroute" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="container">
                        <table id="enrouteTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Start Point</th>
                                    <th>Ending Point</th>
                                    <th>Price</th>
                                    <th>Distance (KMs)</th>
                                    <th>Recipient Contact</th>
                                    <th>Client Contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM order_data WHERE status='PICKED UP' AND driver_id='$_SESSION[userid]'";
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
                                            <td><?php echo $row['recipient_name'] . ' => ' . $row['recipient_contact']; ?></td>
                                            <td> <?php
                                                    $sqlusermini = "SELECT * FROM user_data WHERE user_id='$row[user_id]'";
                                                    $r = mysqli_query($conn, $sqlusermini);
                                                    if (mysqli_num_rows($r) > 0) {
                                                        while ($rr = mysqli_fetch_assoc($r)) {
                                                            echo $rr['first_name'].' '.$rr['last_name'].' => '.$rr['phone'];
                                                        }
                                                    } else {
                                                        echo "Error";
                                                    }
                                                    ?> </td>
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
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Price</th>
                                    <th>Distance</th>
                                    <th>Recipient Contact</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-completed" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="container">
                        <table id="completedTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Start Point</th>
                                    <th>Ending Point</th>
                                    <th>Price</th>
                                    <th>Distance (KMs)</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM order_data WHERE status='COMPLETED' AND driver_id='$_SESSION[userid]'";
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
                                            <td>
                                                <?php
                                                $sqlmini = "SELECT * FROM rating_data WHERE rating_id='$row[rating_id]'";
                                                $r = mysqli_query($conn, $sqlmini);
                                                if (mysqli_num_rows($r) > 0) {
                                                    while ($rr = mysqli_fetch_assoc($r)) {
                                                        echo $rr['rating_comment'];
                                                    }
                                                } else {
                                                    echo "Error";
                                                }
                                                ?>
                                            </td>
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
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Price</th>
                                    <th>Distance</th>
                                    <th>Comment</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
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
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pendingTable').DataTable();
            $('#enrouteTable').DataTable();
            $('#completedTable').DataTable();
        });

        function alertSweet(message, type, title) {
            Swal.fire({
                icon: `${type}`,
                title: `${title}`,
                text: `${message}`
            })
        }

        function completeTrip(orderID, driverID) {
            $.post("./req1.php", {
                    orderID: orderID,
                    driverID: driverID,
                    type: 'completeTrip'
                },
                //Callback
                function(result) {
                    var p = JSON.parse(result);
                    console.log(result);
                    //alert(p.response);
                    if (p.response == "ok") {
                        alertSweet(`Successfully Picked Up the Item ${p.origin} -> ${p.destination}`, 'success', `Recipient: ${p.recipientName} :: ${p.recipientContact}`);
                    } else {
                        alertSweet('Failed, Try Again', 'error', 'Failed');
                    }
                });
        }
    </script>
</body>

</html>