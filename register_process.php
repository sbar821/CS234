<?php
    function user_exists($username, $password, $pdo) {
        if (isset($username)) {
            $sql = 'SELECT password FROM registration WHERE username = ?';
            $statement = $pdo->prepare($sql);
            $statement->execute([$username]);

            $info = $statement->fetch();

            if (!$info) {
                return 'nonexistent';
            } 
            else {
                return 'existent';
            }
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
        catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }

        $result = user_exists($username, $password, $pdo);

        if ($result == 'nonexistent') {
            $sql = 'INSERT INTO registration (username, password) VALUES (:username, :password)';
            $statement = $pdo->prepare($sql);

            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $statement->bindParam(':username', $username);
            $statement->bindParam(':password', $hashed_password);

            $statement->execute();

            session_start();
            $_SESSION['username'] = $username;

            header('Location: home.php');
        } 
        else {
            echo '<h1 style="background-color: rgb(91,134,174); padding: 10px; color: white; text-align: center; font-family:monospace;">User Already Exists!</h1>';
            echo '<div style="text-align: center;"><a style="font-size:20px; background-color: rgb(91,134,174); padding: 10px; color: white; font-family:monospace;" href="login.php">Want to Login?</a><div>';
        } 
    }
?>