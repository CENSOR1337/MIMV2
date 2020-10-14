<?php

ob_start();
ob_end_clean();

/*
session_start();
if(!(isset($_SESSION['username']))){
print json_encode('Please Login');
return;
}
 */
require_once '../../config/connects.php';

if (!($Debug)) {
    if (!(isset($_SESSION['AdministratoAuth']))) {
        print json_encode("invalidAuth");
        return;
    }
}
if (isset($_POST['IdentifyID'])) {

    $IdentifyID = mysqli_escape_string($conn, $_POST['IdentifyID']);

    $sql = "DELETE FROM `AccessibleProfiles` WHERE `AccessibleProfiles`.`IndentifyID` = '$IdentifyID';";

    if ($conn->query($sql) === true) {
        print json_encode(true);
    } else {
        print json_encode(false);
    }

}
