<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Fake Bank - Transactions</title>
</head>
<body>
    <h1>Transactions</h1>
    <p>No transactions available at this time.</p>
    <a href="dashboard.php">Back to Dashboard</a><br>
    <a href="backend/logout.php">Logout</a>
</body>
</html>
