<?php
session_start();
ob_start();
ob_end_clean();

/*
session_start();
if(!(isset($_SESSION['username']))){
print json_encode('Please Login');
return;
}
 */
require_once '../config/connects.php';
if (isset($_POST['username'], $_POST['password'])) {
    $username = mysqli_escape_string($conn, $_POST['username']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM `LoginInfo` WHERE `Username` LIKE '$username' AND `UserStatus` = 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $hash = $row['Password'];
            if (password_verify($password, $hash)) {
                print json_encode(true);
                $_SESSION['AdministratorAuth'] = $username;
                $_SESSION['AdministratorPermission'] = $row['Role'];
            } else {
                print json_encode(false);

            }
        }
    } else {
        print json_encode(false);
    }
}
