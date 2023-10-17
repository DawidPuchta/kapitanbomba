<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location: index.php');
}
?>

<html>
<head>
    <title>Witaj</title>
</head>
<body>
    <h1>Witaj, <?php echo $_SESSION['username']; ?>!</h1>
    <a href="logout.php">Wyloguj się</a>
</body>
</html>
