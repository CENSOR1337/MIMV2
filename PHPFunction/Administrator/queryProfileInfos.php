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

$sql = "SELECT * FROM `AccessibleProfiles`";
$sqlStatus = "SELECT * FROM `AccessibleProfiles` INNER JOIN `Profiles` ON `AccessibleProfiles`.`IndentifyID` LIKE `Profiles`.`IndentifyID`";

$result = $conn->query($sql);
$resultStatus = $conn->query($sqlStatus);

$resultStatusArray = array();
$Return = array();

if ($resultStatus->num_rows > 0) {
    while ($row = $resultStatus->fetch_assoc()) {
        array_push($resultStatusArray, $row['IndentifyID']);
    }
}
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (($row['IndentifyID'])) {
            array_push($Return, array("IndentifyID" => $row['IndentifyID'],
                "Firstname" => $row['Firstname'],
                "Lastname" => $row['Lastname'],
                "Status" => $row['Status'],
                "StudentID" => $row['StudentID'],
                "RegisterStatus" => ((array_search($row['IndentifyID'], $resultStatusArray) !== false) ? true : false),
            ));
        }
    }
    print json_encode($Return);
} else {
    print json_encode($Return);
}
