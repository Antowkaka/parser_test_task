<?php

$host = 'localhost';
$db_database = 'parsing';
$db_user = 'root';
$db_password = '';
$admin_email = 'yuriyyu@wizardsdev.com';

$database = mysqli_connect($host, $db_user, $db_password, $db_database)
or die("Ошибка " . mysqli_error($database));