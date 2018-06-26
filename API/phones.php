<?php

require_once 'connection.php';

$http_origin = $_SERVER['HTTP_ORIGIN'];

if ($http_origin == "http://localhost:3000") {
    header("Access-Control-Allow-Origin: $http_origin", "Content-Type: application/json");
}

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));


// выполняем операции с базой данных
$sql = "SELECT * FROM Phones LIMIT 10 OFFSET 0";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
$eee='http://shop-api.local';
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
//$json = json_encode(['categories' => $rows]);

echo $json;

// закрываем подключение
mysqli_close($link);

