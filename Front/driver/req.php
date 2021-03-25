    <?php 
    include '../db.php';
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
    ?>