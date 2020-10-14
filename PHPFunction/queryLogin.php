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

    $sql = "SELECT * FROM `LoginInfo` WHERE `Username` LIKE '$username' AND `Password` LIKE '$password' AND `UserStatus` = 1 AND `Role` = 'admin'";

    if ($conn->multi_query($sql)) {
        print json_encode(true);
        $_SESSION['AdministratoAuth'] = $username;
    } else {
        print json_encode(false);
    }
}
