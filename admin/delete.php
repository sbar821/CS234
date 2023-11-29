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

    $dsn = 'mysql:host=localhost;dbname=project';
    $username_db = 'root';
    $password_db = 'root';
    $id=$_POST['user_id'];

    try {
        $pdo = new PDO($dsn, $username_db, $password_db);
    } 
    catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
    
    $sql="DELETE FROM song WHERE user_id ='$id'";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    $sql="DELETE FROM color WHERE user_id ='$id'";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    $sql="DELETE FROM registration WHERE id ='$id'";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    header('Location: ../admin.php');
?>