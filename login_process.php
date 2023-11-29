<?php
    session_start();

    function user_exists($username, $password) {
        global $pdo; 
        $sql = 'SELECT password FROM registration WHERE username = ?';
        $statement = $pdo->prepare($sql);
        $statement->execute([$username]);

        $info = $statement->fetch();

        if (!$info) {
            return 'nonexistent';
        }

        $hashed_password = $info['password'];

        if (password_verify($password, $hashed_password)) {
            return 'correct';
        } 
        else {
            return 'incorrect';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $dsn = 'mysql:host=localhost;dbname=project';
        $username_db = 'root';
        $password_db = 'root';

        try {
            $pdo = new PDO($dsn, $username_db, $password_db);
        } 
        catch(PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }

        $result = user_exists($username, $password);

        if ($result == 'nonexistent') {
            header('location: register.php');
        } 
        else if ($result == 'correct') {
            $_SESSION['username'] = $username;

            if($username == 'admin'){
                header('Location: admin.php');
            }
            else{
                header('Location: home.php');
            }

        } 
        else{
            echo '<h1 style="background-color: rgb(91,134,174); padding: 10px; color: white; text-align: center; font-family:monospace;">Incorrect password!</h1>';
            echo '<div style="text-align: center;"><a style="font-size:20px; background-color: rgb(91,134,174); padding: 10px; color: white; font-family:monospace;" href="login.php">Return to Login</a><div>';
        }
    }
?>