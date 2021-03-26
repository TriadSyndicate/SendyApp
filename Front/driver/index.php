<?php
include '../db.php';
session_start();
if (!isset($_SESSION['LoggedIn'])) {
    header("Location: login.php");
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>

<body>
    <?php include './navbar.php'; ?>

    <section class="mbr-section form1 cid-sr3zdiULRq" id="form1-8">
        <table id="example" class="display" style="width:100%">
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
                            <td> <button onclick="completeTrip(<?php echo $row['order_id']; ?>, <?php echo $_SESSION['userid']; ?>)" class="btn btn-secondary btn-form display-4">Complete Trip</button> </td>
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
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </section>

    <?php include '../layouts/footer.php'; ?>

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
            $('#example').DataTable();
        });

        function alertSweet(message, type, title) {
            Swal.fire({
                icon: `${type}`,
                title: `${title}`,
                text: `${message}`
            })
        }

        function completeTrip(orderID, driverID) {
            $.post("req1.php", {
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
                        alertSweet(`Successfully Completed the Trip ${p.origin} -> ${p.destination}`, 'success', `Recipient: ${p.recipientName} :: ${p.recipientContact}`);
                    } else if (p.response == "error") {
                        alertSweet('That email already exists', 'error', 'Failed');
                    }
                });
        }
    </script>
</body>

</html>