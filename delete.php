<?php
// delete.php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM logbook_entries WHERE id = ?");
if ($stmt->execute([$id])) {
    header("Location: index.php");
    exit;
} else {
    echo "Error: Could not delete item.";
}
?>
