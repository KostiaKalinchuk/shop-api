<?php

require_once 'connection.php';

$http_origin = $_SERVER['HTTP_ORIGIN'];

if ($http_origin == "http://localhost:3000") {
    header("Access-Control-Allow-Origin: $http_origin", "Content-Type: application/json");
}

$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

$sql = "SELECT * FROM Categories";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
    $rows[] = array(
        "id" => $row['id'],
        "name" => $row['name']);
}

$json = json_encode($rows);

echo $json;

mysqli_close($link);

