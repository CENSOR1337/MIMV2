<?php
ob_start();
ob_end_clean();

if (isset($_POST['Identify'], $_POST['Firstname'], $_POST['Lastname'], $_POST['Email'],
    $_POST['Gender'], $_POST['BirthDays'], $_POST['BirthMonths'], $_POST['BirthYears'],
    $_POST['AcademicYear'], $_POST['Gender'], $_POST['Room'], $_POST['Degree'])) {
    require_once '../config/connects.php';
    $Identify = mysqli_real_escape_string($conn, $_POST['Identify']);

    $sql = "SELECT * FROM `Profiles` WHERE `IndentifyID` LIKE '$Identify'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $ReturnValue = array("Status" => 'registered');
        print json_encode($ReturnValue);
        return;
    }

    $StudentID = mysqli_real_escape_string($conn, $_POST['StudentID']);
    $Firstname = mysqli_real_escape_string($conn, $_POST['Firstname']);
    $Lastname = mysqli_real_escape_string($conn, $_POST['Lastname']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
    $BirthDays = mysqli_real_escape_string($conn, $_POST['BirthDays']);
    $BirthMonths = mysqli_real_escape_string($conn, $_POST['BirthMonths']);
    $BirthYears = mysqli_real_escape_string($conn, $_POST['BirthYears']);
    $AcademicYear = mysqli_real_escape_string($conn, $_POST['AcademicYear']);
    $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
    $Degree = mysqli_real_escape_string($conn, $_POST['Degree']);
    $Room = mysqli_real_escape_string($conn, $_POST['Room']);

    $BirthDate = $BirthYears . '-' . $BirthMonths . '-' . $BirthDays;

    if (isset($StudentID)) {
        $sql = "INSERT INTO `Profiles` (`IndentifyID`, `StudentID`, `Firstname`, `Lastname`,
        `Gender`, `BirthDate`, `Degree`, `Room`, `AcademicYear`, `permission`)
        VALUES ('$Identify', '$StudentID', '$Firstname', '$Lastname', '$Gender', '$BirthDate', '$Degree', '$Room',
        '$AcademicYear', 'pending');";
    } else {
        $sql = "INSERT INTO `Profiles` (`IndentifyID`, `Firstname`, `Lastname`,
        `Gender`, `BirthDate`, `Degree`, `Room`, `AcademicYear`, `permission`)
        VALUES ('$Identify', '$Firstname', '$Lastname', '$Gender', '$BirthDate', '$Degree', '$Room',
        '$AcademicYear', 'pending');";
    }

    $sql .= "UPDATE `AccessibleProfiles` SET `Firstname` = '$Firstname', `Lastname` = '$Lastname' WHERE `AccessibleProfiles`.`IndentifyID` = '$Identify'";

    if ($conn->multi_query($sql)) {
        $ReturnValue = array("Status" => 'success');
    } else {
        $ReturnValue = array("Status" => 'error');
    }

    print json_encode($ReturnValue);

    $conn->close();

} else {
    print json_encode(false);
}
