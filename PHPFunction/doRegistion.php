<?php
ob_start();
ob_end_clean();



require_once '../config/connects.php';

print json_encode($CheckStatusReturn);
