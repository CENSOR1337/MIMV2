<?php
ob_start();
ob_end_clean();
if (isset($_POST['Identify'], $_POST['Firstname'], $_POST['Lastname'], $_POST['Email'],
    $_POST['Gender'], $_POST['BirthDays'], $_POST['BirthMonths'], $_POST['BirthYears'],
    $_POST['AcademicYear'], $_POST['Gender'], $_POST['Room'], $_POST['Degree'])) {
    require_once '../config/connects.php';
    $Identify = mysqli_real_escape_string($conn, $_POST['Identify']);
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
        '$AcademicYear', 'pending')";
    } else {
        $sql = "INSERT INTO `Profiles` (`IndentifyID`, `Firstname`, `Lastname`,
        `Gender`, `BirthDate`, `Degree`, `Room`, `AcademicYear`, `permission`)
        VALUES ('$Identify', '$Firstname', '$Lastname', '$Gender', '$BirthDate', '$Degree', '$Room',
        '$AcademicYear', 'pending')";
    }

    if ($conn->query($sql) === true) {
        print json_encode('Done!');
    } else {
        print json_encode($sql . "<br>" . $conn->error);
    }

    $conn->close();
} else {
    print json_encode(false);
}
