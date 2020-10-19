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

require_once '../../../config/connects.php';

if (!($Debug)) {
    if (!(isset($_SESSION['AdministratorAuth']))) {
        print json_encode("invalidAuth");
        return;
    }
}
if (isset($_POST['IdentifyID'], $_POST['Firstname'], $_POST['Lastname'], $_POST['Status'], $_POST['StudentID'])) {

    $IdentifyID = mysqli_escape_string($conn, $_POST['IdentifyID']);
    $Firstname = mysqli_escape_string($conn, $_POST['Firstname']);
    $Lastname = mysqli_escape_string($conn, $_POST['Lastname']);
    $Status = mysqli_escape_string($conn, $_POST['Status']);
    $StudentID = mysqli_escape_string($conn, $_POST['StudentID']);

    $sql = "INSERT INTO `AccessibleProfiles` (`IndentifyID`, `Firstname`, `Lastname`, `Status`, `StudentID`)
    VALUES ('$IdentifyID', '$Firstname', '$Lastname', '$Status', '$StudentID')";

    if ($conn->query($sql) === true) {
        print json_encode(true);
    } else {
        print json_encode(false);
    }

}
