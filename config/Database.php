<?php


$pdo = new PDO('mysql:host=localhost;dbname=countries_list', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement = $pdo->prepare('SELECT * FROM countries');
$statement->execute();
$countries = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($countries);
// echo '</pre>';
// foreach ($countries as $key => $data) {
//     echo $data["name"];
// }