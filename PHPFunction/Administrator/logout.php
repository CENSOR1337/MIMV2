<?php

session_start();

unset($_SESSION['AdministratoAuth']);

print json_encode(true);
