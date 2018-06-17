<?php

require_once 'connection.php'; // подключаем скрипт

$http_origin = $_SERVER['HTTP_ORIGIN'];

if ($http_origin == "http://localhost:3000")
{
    header("Access-Control-Allow-Origin: $http_origin", "Content-Type: application/json");
}

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));


// выполняем операции с базой данных
//$query ="SELECT * FROM Categories";
//$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));


$sql = "SELECT * FROM Categories";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

while($row = mysqli_fetch_array($result))
{
    $rows[] = array(
        "id" => $row['id'],
        "name" => $row['name']);
}

$json = json_encode($rows);

//$json = json_encode(['categories' => $rows]);



echo $json;




// закрываем подключение
mysqli_close($link);