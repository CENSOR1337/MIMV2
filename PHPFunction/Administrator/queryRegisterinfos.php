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
require_once '../../config/connects.php';

if (!($Debug)) {
    if (!(isset($_SESSION['AdministratoAuth']))) {
        print json_encode("invalidAuth");
        return;
    }
}

$sql = "SELECT * FROM `Profiles`";

$result = $conn->query($sql);

$Return = array();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (($row['IndentifyID'])) {
            array_push($Return, array(
                "IndentifyID" => $row['IndentifyID'],
                "StudentID" => $row['StudentID'],
                "Firstname" => $row['Firstname'],
                "Lastname" => $row['Lastname'],
                "Gender" => $row['Gender'],
                "BirthDate" => $row['BirthDate'],
                "Degree" => $row['Degree'],
                "Room" => $row['Room'],
                "Status" => $row['Status'],
                "AcademicYear" => $row['AcademicYear'],
                "Permission" => $row['permission'],
                "Email" => $row['Email'],
            ));
        }
    }
    
    print json_encode($Return);
} else {
    print json_encode($Return);
}
