<?php

$host = 'localhost';
$db_database = 'parsing';
$db_user = 'root';
$db_password = '';

$database = mysqli_connect($host, $db_user, $db_password, $db_database)
or die("Ошибка " . mysqli_error($database));

//$query ="SELECT post_title FROM content";
//$result = mysqli_query($link, $query) or die("Error" . mysqli_error($link));
//if($result)
//{
//    while ($row = mysqli_fetch_array($result)) {
//        print("Настроение: " . $row['post_title'] . "<br>");
//    }
//
//}