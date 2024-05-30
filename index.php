<?php
// index.php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM logbook_entries");
$logbook_entries = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Logbook</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="logout-title">
        <h2>Logbook</h2>
        <a href="logout.php">Logout</a>
    </div>
    <a href="add.php">Add Entry</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Entry Date</th>
            <th>Entry Time</th>
            <th>Week</th>
            <th>Day</th>
            <th>Activity Description</th>
            <th>Working Hour</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($logbook_entries as $item) : ?>
            <tr>
                <td><?php echo htmlspecialchars($item['id']); ?></td>
                <td><?php echo htmlspecialchars($item['entry_date']); ?></td>
                <td><?php echo htmlspecialchars($item['entry_time']); ?></td>
                <td><?php echo htmlspecialchars($item['week']); ?></td>
                <td><?php echo htmlspecialchars($item['days']); ?></td>
                <td><?php echo htmlspecialchars($item['activity_description']); ?></td>
                <td><?php echo htmlspecialchars($item['working_hour']); ?></td>
                <td><?php echo htmlspecialchars($item['created_at']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo htmlspecialchars($item['id']); ?>">Edit</a>
                    <a href="delete.php?id=<?php echo htmlspecialchars($item['id']); ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>