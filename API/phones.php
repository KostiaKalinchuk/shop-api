<?php

require_once 'connection.php';

$http_origin = $_SERVER['HTTP_ORIGIN'];

if ($http_origin == "http://localhost:3000") {
    header("Access-Control-Allow-Origin: $http_origin", "Content-Type: application/json");
}

if(!isset($_GET['offset'])) {
    $offset = 0;
}else{
    $offset = $_GET['offset'];
}

if(!isset($_GET['limit'])) {
    $limit = 3;
}else{
    $limit = $_GET['limit'];
}

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

$sql = "SELECT * FROM Phones LIMIT $limit OFFSET $offset";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
    $rows[] = array(
        "id" => $row['id'],
        "categoryId" => $row['categoryId'],
        "name" => $row['name'],
        "description" => $row['description'],
        "price" => $row['price'],
        "image" => $row['image'],
        "cpu" => $row['cpu'],
        "camera" => $row['camera'],
        "size" => $row['size'],
        "weight" => $row['weight'],
        "display" => $row['display'],
        "battery" => $row['battery'],
        "memory" => $row['memory'],
        "color" => $row['color'],
        "system" => $row['system'],
        "connection" => $row['connection'],
        "material" => $row['material'],
        "navigation" => $row['navigation'],
        "audio" => $row['audio'],
        "video" => $row['video']
    );
}

$json = json_encode($rows);

echo $json;

mysqli_close($link);

