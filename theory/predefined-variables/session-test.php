<?php
session_save_path('/tmp/');
session_start();
$_SESSION['name'] = 'Fred';
echo ($_SESSION['name'] ?? 'Not available');

echo ("<br>");

$_SESSION = [];
$sess_params = session_get_cookie_params();
setcookie(
  session_name(),
  '',
  time() - 60,
  $sess_params['path'],
  $sess_params['domain'],
  $sess_params['secure'],
  $sess_params['httponly']
);

session_destroy();

echo ($_SESSION['name'] ?? 'Not available');
