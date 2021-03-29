    <?php
    include '../db.php';
    $sql = "UPDATE order_data SET driver_id='$_POST[driverID]', status='PICKED UP' WHERE order_id=$_POST[orderID]";

    if (mysqli_query($conn, $sql)) {
        $resp = new \stdClass();
        $sql1 = "SELECT * FROM order_data";
        $result = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['order_id'] == $_POST['orderID']) {
                    # code...
                    $resp->destination = $row['destination'];
                    $resp->origin = $row['origin'];
                    $resp->distance = $row['distance'];
                    $resp->recipientName = $row['recipient_name'];
                    $resp->recipientContact = $row['recipient_contact'];
                    $resp->response = 'ok';
                }
            }
        } else {
            echo "0 results";
        }
        $resp->response = 'ok';
    } else {
        $resp = new \stdClass();
        $resp->response = mysqli_error($conn);
    }

    mysqli_close($conn);
    $myJSON = json_encode($resp);
    echo $myJSON;
    ?>