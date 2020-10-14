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

if (isset($_POST['toDeleteArray'])) {

    $toDelete = json_decode(stripslashes($_POST['toDeleteArray']));

    $toDeleteStringArray = "('" . implode("', '", $toDelete) . "')";

    $sql = "DELETE FROM `AccessibleProfiles` WHERE `AccessibleProfiles`.`IndentifyID` IN $toDeleteStringArray;";

    if ($conn->query($sql) === true) {
        print json_encode(true);
    } else {
        print json_encode(false);
    }

}
