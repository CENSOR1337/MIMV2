<?php


require_once '../config/connects.php';

if (isset($_POST['checkingID'])) {

    $ID = mysqli_escape_string($conn, $_POST['checkingID']);


    $sql = "SELECT * FROM `Profiles` WHERE `IndentifyID` LIKE '$ID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
            print json_encode($row);
        }
    }else{
            print json_encode(array('permission' => 'notFound'));
    }

    $conn->close();
}
