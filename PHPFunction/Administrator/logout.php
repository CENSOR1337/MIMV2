<?php

session_start();

unset($_SESSION['AdministratorAuth']);

print json_encode(true);
