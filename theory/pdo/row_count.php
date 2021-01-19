<?php 

$con = new PDO('mysql:host=localhost; dbname=pdo', 'pdo', '123');

$user = $con->query("
          select * from users
          ");

echo $user->rowCount();

$update = $con->query("
    update users set active = 1 where id = 2
    ");

echo $update->rowCount();
