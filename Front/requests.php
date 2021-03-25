<?php
session_start();
include './db.php';
if (isset($_POST['type'])) {

    if ($_POST['type'] == 'clientSignUp') {
        $stmt = $conn->prepare('SELECT * FROM user_data WHERE email = ? OR phone = ?');
        $stmt->bind_param('ss', $_POST['email'], $_POST['phone']);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $row = $result->fetch_assoc();
        if ($row == null) {
            $stmt1 = $conn->prepare('INSERT INTO user_data(email, phone, hashed_password, first_name, last_name, role) VALUES(?,?,?,?,?,?)');
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt1->bind_param('ssssss', $_POST['email'], $_POST['phone'], $hashedPassword, $_POST['firstName'], $_POST['lastName'], $_POST['role']);
            $stmt1->execute();
            $resp = new \stdClass();
            $resp->firstName = $_POST['firstName'];
            $resp->lastName = $_POST['lastName'];
            $resp->email = $_POST['email'];
            $resp->phone = $_POST['phone'];
            $resp->role = $_POST['role'];
            $resp->response = 'ok';

            $stmt1->close();
            $conn->close();
        } else {
            $resp = new \stdClass();
            $resp->response = 'error';
        }
        $myJSON = json_encode($resp);
        echo $myJSON;
    } else if ($_POST['type'] == 'clientSignIn') {
        $stmt2 = $conn->prepare('SELECT * FROM user_data WHERE email = ? OR phone = ?');
        $stmt2->bind_param('ss', $_POST['email'], $_POST['email']);
        $stmt2->execute();
        $result = $stmt2->get_result();
        $stmt2->close();

        while ($row2 = $result->fetch_assoc()) {
            if ($row2['email'] == $_POST['email'] || $row2['phone'] == $_POST['email']) {
                if (password_verify($_POST['password'], $row2['hashed_password'])) {
                    $_SESSION['LoggedIn'] = true;
                    $_SESSION['userid'] = $row2['user_id'];
                    $_SESSION['firstName'] = $row2['first_name'];
                    $_SESSION['lastName'] = $row2['last_name'];
                    $_SESSION['email'] = $row2['email'];
                    $_SESSION['phone'] = $row2['phone'];
                    $_SESSION['role'] = $row2['role'];
                    $_SESSION['image'] = $row2['image'];

                    $resp = new \stdClass();
                    $resp->firstName = $row2['first_name'];
                    $resp->lastName = $row2['last_name'];
                    $resp->email = $row2['email'];
                    $resp->phone = $row2['phone'];
                    $resp->role = $row2['role'];
                    $resp->image = $row2['image'];
                    $resp->userid = $row2['user_id'];
                    $resp->response = 'success';

                } else {
                    $resp = new \stdClass();
                    $resp->response = 'error';
                }
            } else {
                $resp = new \stdClass();
                $resp->response = 'error';
            }
        }
        $myJSON = json_encode($resp);
        echo $myJSON;
    }
    else if($_POST['type'] == 'orderPOST'){
        $stmt3 = $conn->prepare('INSERT INTO order_data(user_id, origin, destination, distance, price, recipient_name, recipient_contact, status) VALUES(?,?,?,?,?,?,?,?)');
        $stmt3->bind_param('ssssssss', $_POST['user_id'], $_POST['origin'], $_POST['destination'], $_POST['distance'], $_POST['price'], $_POST['recipient_name'], $_POST['recipient_contact'], $_POST['status']);
        $stmt3->execute();
        $last_id = $conn->insert_id;
        $resp = new \stdClass();
        $resp->lastid = $last_id;
        $resp->response = 'ok';
        $myJSON = json_encode($resp);
        echo $myJSON;
    }
}
