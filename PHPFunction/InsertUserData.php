<?php
ob_start();
ob_end_clean();
/*
require '../config/config.php';

$StudentID = $_POST['StudentID'];

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
} else {
    echo "0 results";
}
*/

$CheckStatusReturn = array($_POST['StudentID']);

print json_encode($CheckStatusReturn);