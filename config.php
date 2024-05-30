
<?php

// Configuration file: config.php

$host = 'localhost';
$db = 'log_db';
$user = 'root';
$pass = '';

try {
  // Connect to the database using PDO
  $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Could not connect to the database: " . $e->getMessage());
}
?>