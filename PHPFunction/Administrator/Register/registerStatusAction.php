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
if (isset($_POST['studentID'], $_POST['action'])) {

    $studentID = mysqli_escape_string($conn, $_POST['studentID']);
    $action = mysqli_escape_string($conn, $_POST['action']);

    $sql = "UPDATE `Profiles` SET `permission` = '$action' WHERE `Profiles`.`IndentifyID` = '$studentID'";

    $sqlQueryInfo = "SELECT * FROM `Profiles` WHERE `IndentifyID`LIKE '$studentID'";

    $resultQueryInfo = $conn->query($sqlQueryInfo);
    if ($resultQueryInfo->num_rows > 0) {
        // output data of each row
        while ($row = $resultQueryInfo->fetch_assoc()) {

            $BirthDate = explode("-", $row['BirthDate']);
            $DefaultPassword = $BirthDate[2] . $BirthDate[1] . ($BirthDate[0] + 543);
            $IndentifyID = $row['IndentifyID'];
            $Username = $row['IndentifyID'];
            $UserStatus = ($row['permission'] == 'verified' ? true : false);
            
            $hashedPassword = password_hash($DefaultPassword, PASSWORD_DEFAULT);;

            switch ($action) {
                case 'verified':
                    $sqlInsert = "INSERT INTO `LoginInfo` (`IndentifyID`, `Username`, `Password`, `UserStatus`) 
                    VALUES ('$IndentifyID', '$Username', '$hashedPassword', '1')";
                    break;

                case 'suspended':
                    $sqlInsert = "DELETE FROM `LoginInfo` WHERE `LoginInfo`.`Username` = '$IndentifyID'";
                    break;
            }

            $conn->query($sqlInsert);

        }
    }

    if ($conn->query($sql) === true) {
        print json_encode(true);
    } else {
        print json_encode(false);
    }
}
