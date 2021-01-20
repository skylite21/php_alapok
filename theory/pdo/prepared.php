<?php 

try {
  $con = new PDO('mysql:host=localhost; dbname=pdo', 'pdo', '123');
} catch (PDOException $e) {
  die('oops');
}

// to prevent SQL injection first prepare the statement
$user = $con->prepare("
          select * from users
          where first_name= :first_name
          ");

$execution = $user->execute([
        'first_name' => $_GET['first_name']
]);

if ($execution) {
  $user = $user->fetchAll(PDO::FETCH_OBJ);
  var_dump($user);
}
// different placeholder
$user = $con->prepare("
          select * from users
          where first_name= ?
          and last_name = ?
          ");

$execution = $user->execute([ 'John', 'Doe' ]);

if ($execution) {
  $user = $user->fetchAll(PDO::FETCH_OBJ);
  var_dump($user);
}


// bind values
$first_name = 'Zsolt';
$username = 'skylite';
$user = $con->prepare("
          select * from users
          where first_name = :first_name
          and username = :username
          ");

$user->bindValue(':first_name', $first_name);
$user->bindValue(':username', $username);

$execution = $user->execute();

if ($execution) {
  $user = $user->fetchAll(PDO::FETCH_OBJ);
  var_dump($user);
}

// complex binding
$first_name = 'Z';
$user = $con->prepare("
          select * from users
          where first_name LIKE :first_name
          ");

$user->bindValue(':first_name', "$first_name%");

$execution = $user->execute();

if ($execution) {
  $user = $user->fetchAll(PDO::FETCH_OBJ);
  var_dump($user);
}
// bind param
$first_name = 'Z';
$user = $con->prepare("
          select * from users
          where first_name = :first_name
          ");

$user->bindParam(':first_name', $first_name);
$first_name = 'P';
$execution = $user->execute();

if ($execution) {
  $user = $user->fetchAll(PDO::FETCH_OBJ);
  var_dump($user);
}
?>
