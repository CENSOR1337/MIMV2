<?php
require 'config.php';

$conn = new mysqli($ServerName, $ServerUsername, $ServerPassword, $ServerDatabaseName);
$conn->set_charset("utf8");

function IsServerOnline()
{
    if ($conn->connect_error) {
        return false;
    } else {
        return true;
    }
    return null;
};
