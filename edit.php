<?php
// edit.php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM logbook_entries WHERE id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $days = $_POST['days'];
    $week = $_POST['week'];
    $activity_description = $_POST['activity_description'];
    $working_hour = $_POST['working_hour'];

    $stmt = $pdo->prepare("UPDATE logbook_entries SET days = ?, week = ?, activity_description = ?, working_hour = ? WHERE id = ?");
    if ($stmt->execute([$days, $week, $activity_description, $working_hour, $id])) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: Could not update item.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Entry</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Edit Entry</h2>
    <form method="post">
        <label>Week</label>
        <input type="text" name="week" value="<?php echo htmlspecialchars($item['week']); ?>" required>
        <label>Day</label>
        <input type="text" name="days" value="<?php echo htmlspecialchars($item['days']); ?>" required>
        <label>Activity Description</label>
        <textarea name="activity_description" required><?php echo htmlspecialchars($item['activity_description']); ?></textarea>
        <label>Working Hour</label>
        <input type="text" name="working_hour" value="<?php echo htmlspecialchars($item['working_hour']); ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
