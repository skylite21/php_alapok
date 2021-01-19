<?php 


try {
  $con = new PDO('mysql:host=localhost; dbname=pdo', 'pdo', '123');
} catch (PDOException $e) {
  die('oops');
}
// var_dump(PDO::getAvailableDrivers());
$user = $con->query("select * from users where id=1;");
var_dump($user->fetch(PDO::FETCH_ASSOC));
var_dump($user->fetch(PDO::FETCH_OBJ));

$users = $con->query("select * from users");
var_dump($users->fetchAll(PDO::FETCH_ASSOC));
?>
