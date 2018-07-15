<?php

require_once 'connection.php';

header("Access-Control-Allow-Origin: http://localhost:3000");

$json = file_get_contents('php://input');

$obj = json_decode($json, true);

$name = $obj['name'];
$email = $obj['email'];
$message = $obj['message'];

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

$sql = "INSERT INTO Feedback (name, email, message) VALUES ('$name', '$email', '$message')";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

mysqli_close($link);


