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

$sql = "SET FOREIGN_KEY_CHECKS = 0;";
$sql .= "TRUNCATE AccessibleProfiles;";
$sql .= "SET FOREIGN_KEY_CHECKS = 1;";

if ($conn->multi_query($sql)) {
    print json_encode(true);
} else {
    print json_encode(false);
}
