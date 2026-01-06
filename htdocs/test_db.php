<?php
echo "mysqli: " . (extension_loaded('mysqli') ? "OK" : "NO") . "<br>";
echo "pdo_mysql: " . (extension_loaded('pdo_mysql') ? "OK" : "NO") . "<br>";

$host = 'db';
$db   = getenv('MARIADB_DATABASE') ?: 'database';
$user = getenv('MARIADB_USER') ?: 'username';
$pass = getenv('MARIADB_PASSWORD') ?: 'password';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
  echo "PDO conexión: OK<br>";
} catch (Throwable $e) {
  echo "PDO conexión: ERROR -> " . $e->getMessage() . "<br>";
}
