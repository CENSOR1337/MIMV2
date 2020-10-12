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

$sql = "SELECT ( SELECT COUNT(*) FROM `AccessibleProfiles`) AS accessibleProfiles , (SELECT COUNT(*) FROM `Profiles`) AS registered,(SELECT COUNT(*) FROM `Profiles` WHERE `permission` LIKE 'suspended') AS suspended,(SELECT COUNT(*) FROM `Profiles` WHERE `permission` LIKE 'pending') AS pending";

$result = $conn->query($sql);
$Return = null;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $Return = array("accessibleProfiles" => $row['accessibleProfiles'],
            "registered" => $row['registered'],
            "suspended" => $row['suspended'],
            "pending" => $row['pending']
        );
    }
    print json_encode($Return);
} else {

    print json_encode($Return);
}
