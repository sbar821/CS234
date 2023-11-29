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

    $id = $_POST['user_id'];
    $vault = $_POST['vault'];
    $dlx = $_POST['dlx'];

    $dsn = 'mysql:host=localhost;dbname=project';
    $username_db = 'root';
    $password_db = 'root';

    try {
        $pdo = new PDO($dsn, $username_db, $password_db);
    } 
    catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }

    $sql = 'INSERT INTO `song` (`vault`, `dlx`, `user_id`) VALUES (:vault, :dlx, :id)';
    $statement = $pdo->prepare($sql);

    $statement->bindParam(':vault', $vault);
    $statement->bindParam(':dlx', $dlx);
    $statement->bindParam(':id', $id);

    $statement->execute();
    header('Location: ../admin.php');
?>