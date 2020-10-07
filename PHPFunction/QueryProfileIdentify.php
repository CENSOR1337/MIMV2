<?php
ob_start();
ob_end_clean();
if (isset($_POST['Identify'])) {
    require_once '../config/connects.php';
    $ReturnValue = null;
    $Identify = mysqli_real_escape_string($conn, $_POST['Identify']);
    $Firstname = mysqli_real_escape_string($conn, $_POST['Firstname']);
    $Lastname = mysqli_real_escape_string($conn, $_POST['Lastname']);

    $sql = "SELECT * FROM `Profiles` WHERE `IndentifyID` LIKE '$Identify'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $ReturnValue = array("Status" => 'registered');
        print json_encode($ReturnValue);
        return;
    }

    $sql = "SELECT * FROM `AccessibleProfiles` WHERE `IndentifyID` LIKE '$Identify'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($Firstname == $row['Firstname'] && $Lastname == $row['Lastname']) {
                $ReturnValue = array("Status" => 'success',
                    "Identify" => $Identify,
                    "StudentID" => $row['StudentID'],
                    "Firstname" => $row['Firstname'],
                    "Lastname" => $row['Lastname']);
            } else {
                $ReturnValue = array("Status" => 'mismatch',
                    "Identify" => $Identify,
                    "StudentID" => $row['StudentID'],
                    "Firstname" => $row['Firstname'],
                    "Lastname" => $row['Lastname']);
            }

        }
    } else {
        $ReturnValue = array("Status" => 'notFound');
    }
    $conn->close();

    print json_encode($ReturnValue);
} else {
    print json_encode(false);
}
