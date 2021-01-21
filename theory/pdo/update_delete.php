<?php

$con = new PDO('mysql:host=localhost; dbname=pdo', 'pdo', '123');
$user = $con->prepare("
          update users set first_name = :first_name
          where id = :id
          ");

$execution = $user->execute([
  'first_name' => 'Zsolt2',
  'id' => 2,
]);


$user = $con->prepare("
          delete from users
          where id = :id
          ");

$execution = $user->execute([
  'id' => 1,
]);

$user = $con->prepare("
          insert into users
          (first_name, username, email, active, passworc)
          values
          (:first, :user, :email, :active, :passworc)
          ");

$user->execute([
  'first' => 'Edwin',
  'user' => 'John',
  'email' => 'd@d.hu',
  'active' => 1,
  'passworc' => 'sdf',
]);

$last_id = $con->lastInsertId();

$con->query("
    update users set active = 0 where id = $last_id
");
