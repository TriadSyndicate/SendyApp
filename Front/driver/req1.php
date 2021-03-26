    <?php 
    include '../db.php';
    $sql = "UPDATE order_data SET driver_id='$_POST[driverID]' WHERE id=$_POST[orderID]";

    if (mysqli_query($conn, $sql)) {
        $resp = new \stdClass();
        $resp->firstName = $_POST['firstName'];
        $resp->lastName = $_POST['lastName'];
        $resp->email = $_POST['email'];
        $resp->phone = $_POST['phone'];
        $resp->role = $_POST['role'];
        $resp->response = 'ok';
    } else {
        $resp = new \stdClass();
        $resp->response = 'error';
    }
    
        mysqli_close($conn);
        $myJSON = json_encode($resp);
        echo $myJSON;
    ?>