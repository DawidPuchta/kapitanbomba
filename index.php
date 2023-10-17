<?php
session_start();
require 'db.php';

// Logowanie
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header('location: welcome.php');
    } else {
        echo 'Nieprawidłowe dane logowania.';
    }
}

// Rejestracja
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
    
    if ($conn->query($sql) === true) {
        echo 'Zarejestrowano pomyślnie. <a href="index.php">Zaloguj się</a>';
    } else {
        echo 'Błąd podczas rejestracji: ' . $conn->error;
    }
}
?>

<html>
<head>
    <title>Logowanie i rejestracja</title>
</head>
<body>
    <h2>Logowanie</h2>
    <form method="post" action="index.php">
        <input type="text" name="username" placeholder="Nazwa użytkownika" required><br><br>
        <input type="password" name="password" placeholder="Hasło" required><br><br>
        <input type="submit" name="login" value="Zaloguj">
    </form>

    <h2>Rejestracja</h2>
    <form method="post" action="index.php">
        <input type="text" name="username" placeholder="Nazwa użytkownika" required><br><br>
        <input type="password" name="password" placeholder="Hasło" required><br><br>
        <input type="submit" name="register" value="Zarejestruj">
    </form>
</body>
</html>
