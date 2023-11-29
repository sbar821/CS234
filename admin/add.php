<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header('location: ../login.php');
    }
    if ($_SESSION['username'] != 'admin') {
        header('location: ../home.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: ../login.php");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $dsn = 'mysql:host=localhost;dbname=project';
    $username_db = 'root';
    $password_db = 'root';

    try {
        $pdo = new PDO($dsn, $username_db, $password_db);
    } 
    catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }

    $sql = 'INSERT INTO registration (username, password) VALUES (:username, :password)';
    $statement = $pdo->prepare($sql);

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $hashed_password);

    $statement->execute();
    header('Location: ../admin.php');
?>