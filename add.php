<?php
// add.php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $starting = $_POST['starting'];
    $ending = $_POST['ending'];
    $week = $_POST['week'];
    $day = $_POST['Day'];
    $description = $_POST['description'];
    $workinghour = $_POST['workinghour'];

    // Assuming entry_date and entry_time can be derived from the current timestamp
    $entry_date = date('Y-m-d');
    $entry_time = date('H:i:s');
    $created_at = date('Y-m-d H:i:s');

    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO logbook_entries (entry_date, entry_time, days, week, activity_description, working_hour, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$entry_date, $entry_time, $day, $week, $description, $workinghour, $created_at])) {
        header("Location: index.php");
    } else {
        echo "Error: Could not add item.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Entry</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="add.css">
</head>

<body>
    <h2>Logbook Entry Form</h2>
    <form method="post">
        <div class="dates">
           <div class="date">
           <label>Starting date</label>
            <input type="date" name="starting" required>
           </div>
           <div class="date">
            <label>Ending date</label>
            <input type="date" name="ending" required>
           </div>
        </div>
        <label>Week</label>
        <input type="text" name="week">
        <label>Day</label>
        <input type="text" name="Day">
        <label>Activity description</label>
        <textarea name="description" id=""></textarea>
        <label>Working hour</label>
        <input type="text" name="workinghour">
        <button type="submit">Add</button>
    </form>
</body>

</html>