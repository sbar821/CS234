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

    $id=$_POST['user_id'];
    $username = $_POST['username'];

    $dsn = 'mysql:host=localhost;dbname=project';
    $username_db = 'root';
    $password_db = 'root';

    try {
        $pdo = new PDO($dsn, $username_db, $password_db);
    } 
    catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
    
    $sql= "UPDATE `registration` SET `username` = '$username' WHERE `registration`.`id` = $id";
    
    $statement = $pdo->prepare($sql);

    $statement->execute();
    header('Location: ../admin.php');
?>