<?php

require_once 'connection.php';

header("Access-Control-Allow-Origin: http://localhost:3000");

$json = file_get_contents('php://input');

$obj = json_decode($json, true);

$name = $obj[0]['name'];
$count = $obj[0]['count'];
$price = $obj[0]['price']*$count;

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

$sql = "INSERT INTO Orders (name, price, count) VALUES ('$name', '$price', '$count')";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

mysqli_close($link);