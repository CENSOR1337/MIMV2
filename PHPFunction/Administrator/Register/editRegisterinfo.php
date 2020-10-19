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
if (isset($_POST['Firstname'], $_POST['Lastname'], $_POST['Status'], $_POST['StudentID'], $_POST['toEditIndentifyID'], $_POST['BirthDate'], $_POST['Email'], $_POST['Gender'], $_POST['AcademicYear'], $_POST['Status'], $_POST['Permission'], $_POST['Degree'], $_POST['Room'])) {

    $toEditIndentifyID = mysqli_escape_string($conn, $_POST['toEditIndentifyID']);
    $StudentID = mysqli_escape_string($conn, $_POST['StudentID']);
    $Firstname  = mysqli_escape_string($conn, $_POST['Firstname']);
    $Lastname  = mysqli_escape_string($conn, $_POST['Lastname']);
    $BirthDate  = mysqli_escape_string($conn, $_POST['BirthDate']);
    $Email  = mysqli_escape_string($conn, $_POST['Email']);
    $Gender = mysqli_escape_string($conn, $_POST['Gender']);
    $AcademicYear  = mysqli_escape_string($conn, $_POST['AcademicYear']);
    $Status = mysqli_escape_string($conn, $_POST['Status']);
    $Permission  = mysqli_escape_string($conn, $_POST['Permission']);
    $Degree  = mysqli_escape_string($conn, $_POST['Degree']);
    $Room  = mysqli_escape_string($conn, $_POST['Room']);    
    
    $sql = "UPDATE `Profiles` SET `StudentID` = '$StudentID', `Firstname` = ' $Firstname', `Lastname` = '$Lastname', `Gender` = '$Gender', `BirthDate` = '$BirthDate', `Degree` = '$Degree', `Room` = '$Room', `Status` = '$Status', `AcademicYear` = '$AcademicYear', `permission` = '$Permission', `Email` = '$Email' WHERE `Profiles`.`IndentifyID` = '$toEditIndentifyID'";


    if ($conn->query($sql) === true) {
        print json_encode(true);
    } else {
        print json_encode(false);
    }

}
