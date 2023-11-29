<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
if ($_SESSION['username'] != 'admin') {
    header('location: home.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Admin</title>
</head>
<body>
<style>
        @font-face {
            font-family: 'TSHandwriting';
            src: url('assets/tSwiftH.ttf') format('truetype');
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgb(91,134,174);
            font-family: 'TSHandwriting', Arial, Helvetica, sans-serif;
            font-size: 35px;
            padding: 20px;
        }

        .header-left,
        .header-center,
        .header-right {
            display: flex;
            align-items: center;
        }

        .header-left a,
        .header-center a,
        .header-right a {
            color: rgb(241,242,243);
            text-decoration: none;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-left">
            <a href="home.php">1989</a>
        </div>
        <div class="header-center">
            <a href="home.php">Taylor Swift</a>
        </div>
        <div class="header-right">
            <a href="#">hi, <?php echo $_SESSION['username']; ?></a>
        </div>
        <div class="header-right">
            <a href="logout.php">Logout</a>
            
        </div>
    </header>

<h1 class = "w3-center" style="font-family: 'TSHandwriting';">User Table</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username, password FROM registration";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div style="font-family:\'Courier New\', Courier, monospace; display: flex; justify-content:space-evenly; align-items: center; ">';
    while($row = $result->fetch_assoc()) {
        echo " ID: " . $row["id"]. " - Username: " . $row["username"]. " - Password: " . $row["password"]. "<br>";
    }
    echo "</div>";
}

$conn->close();
?>
<div class= "w3-center" style="text-align:justify; padding: 3%">
    <div class="w3-card w3-round" style="display:inline-block; vertical-align: middle; padding: 10px; text-align:center; width: 250px;">
    <h1 style="font-family:'TSHandwriting'">Delete User</h1>
    
    <form name="delete" action ="admin/delete.php" method="POST" style="font-family:'Courier New', Courier, monospace; ">
        <label for="delete">user_id</label>
        <input type="text" id="user_id" name="user_id" style="padding:1%;">
        <br>
        <input type="submit" value="submit" style="background-color:rgb(91,134,174); margin:5px;" class=" w3-button w3-round w3-text-white">
    </form>
    </div>

    <div class="w3-card w3-round" style="display:inline-block; vertical-align: middle; padding: 10px; text-align:center; margin: 7%; width: 250px;">
    <h1 style="font-family:'TSHandwriting'">Add User</h1>
    
    <form name="add" action ="admin/add.php" method="POST" style=" font-family:'Courier New', Courier, monospace;">
        <label for="login">Username</label>
        <br>
        <input type="text" id="username" name="username" style="padding:1%;">
        <br>
        <label for="login">Password</label>
        <input type="password" id="password" name="password" style="padding:1%;">
        <br>
        <input type="submit" value="submit" style="background-color:rgb(91,134,174); margin:5px;" class=" w3-button w3-round w3-text-white">
    </form>
    </div>

    <div class="w3-card w3-round" style="display:inline-block; vertical-align: middle; padding: 10px; text-align:center; width: 250px;">
    <h1 style="font-family:'TSHandwriting'">Edit User</h1>
    
    <form name="edit" action ="admin/edit.php" method="POST" style=" font-family:'Courier New', Courier, monospace;">
        <label for="edit">user_id</label>
        <br>
        <input type="text" id="user_id" name="user_id" style="padding:1%;">
        <br>
        <label for="edit">Username</label>
        <br>
        <input type="text" id="username" name="username" style="padding:1%;">
        <br>
        <input type="submit" value="submit" style="background-color:rgb(91,134,174); margin:5px;" class=" w3-button w3-round w3-text-white">
    </form>
    </div>
</div>


<h1 class = "w3-center" style="font-family: 'TSHandwriting';">Color Table</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, album, dress, user_id FROM color";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div style="font-family:\'Courier New\', Courier, monospace; display: flex; justify-content:space-evenly; align-items: center; ">';
    while($row = $result->fetch_assoc()) {
        echo " ID: " . $row["id"]. " - Album: " . $row["album"]. " - Dress: " . $row["dress"]. " - User_id: " . $row["user_id"]. "<br>";
    }
    echo "</div>";
}
$conn->close();
?>
<div class= "w3-center" style="text-align:justify; padding: 3%">
    <div class="w3-card w3-round" style="display:inline-block; vertical-align: middle; padding: 10px; text-align:center">
    <h1 style="font-family:'TSHandwriting'">Delete Color</h1>
    
    <form name="delete" action ="admin/deleteColor.php" method="POST" style=" font-family:'Courier New', Courier, monospace;">
        <label for="delete">id</label>
        <input type="text" id="id" name="id" style="padding:1%;">
        <br>
        <input type="submit" value="submit" style="background-color:rgb(91,134,174); margin:5px;" class=" w3-button w3-round w3-text-white">
    </form>
    </div>

    <div class="w3-card w3-round" style="display:inline-block; vertical-align: middle; padding: 10px; text-align:center; margin: 7%; width: 250px;">
    <h1 style="font-family:'TSHandwriting'">Add Color</h1>
    
    <form name="add" action ="admin/addColor.php" method="POST" style=" font-family:'Courier New', Courier, monospace;">
        <label for="add">Album</label>
        <br>
        <input type="text" id="album" name="album" style="padding:1%;">
        <br>
        <label for="add">Dress</label>
        <br>
        <input type="text" id="dress" name="dress" style="padding:1%;">
        <br>
        <label for="add">User_id</label>
        <br>
        <input type="text" id="user_id" name="user_id" style="padding:1%;">
        <br>
        <input type="submit" value="submit" style="background-color:rgb(91,134,174); margin:5px;" class=" w3-button w3-round w3-text-white">
    </form>
    </div>

    <div class="w3-card w3-round" style="display:inline-block; vertical-align: middle; padding: 10px; text-align:center; width: 250px;">
    <h1 style="font-family:'TSHandwriting'">Edit Color</h1>
    
    <form name="edit" action ="admin/editColor.php" method="POST" style=" font-family:'Courier New', Courier, monospace;">
        <label for="edit">id</label>
        <br>
        <input type="text" id="user_id" name="user_id" style="padding:1%;">
        <br>
        <label for="edit">Album</label>
        <br>
        <input type="text" id="album" name="album" style="padding:1%;">
        <br>
        <label for="edit">Dress</label>
        <br>
        <input type="text" id="dress" name="dress" style="padding:1%;">
        <br>
        <input type="submit" value="submit" style="background-color:rgb(91,134,174); margin:5px;" class=" w3-button w3-round w3-text-white">
    </form>
    </div>
</div>

<h1 class = "w3-center" style="font-family: 'TSHandwriting';">Song Table</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, vault, dlx, user_id FROM song";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div style="font-family:\'Courier New\', Courier, monospace; display: flex; justify-content:space-evenly; align-items: center; ">';
    while($row = $result->fetch_assoc()) {
        echo " ID: " . $row["id"]. " - Vault: " . $row["vault"]. " - DLX: " . $row["dlx"]. " - User_id: " . $row["user_id"]. "<br>";
    }
    echo "</div>";
}

$conn->close();
?>
<div class= "w3-center" style="text-align:justify; padding: 3%">
    <div class="w3-card w3-round" style="display:inline-block; vertical-align: middle; padding: 10px; text-align:center; width: 250px;">
    <h1 style="font-family:'TSHandwriting'">Delete Song</h1>
    
    <form name="delete" action ="admin/deleteSong.php" method="POST" style=" font-family:'Courier New', Courier, monospace;">
        <label for="delete">id</label>
        <br>
        <input type="text" id="id" name="id" style="padding:1%;">
        <br>
        <input type="submit" value="submit" style="background-color:rgb(91,134,174); margin:5px;" class=" w3-button w3-round w3-text-white">
    </form>
    </div>

    <div class="w3-card w3-round" style="display:inline-block; vertical-align: middle; padding: 10px; text-align:center; margin: 7%; width: 250px;">
    <h1 style="font-family:'TSHandwriting'">Add Song</h1>
    
    <form name="add" action ="admin/addSong.php" method="POST" style=" font-family:'Courier New', Courier, monospace;">
        <label for="add">Vault</label>
        <br>
        <input type="text" id="vault" name="vault" style="padding:1%;">
        <br>
        <label for="add">DLX</label>
        <br>
        <input type="text" id="dlx" name="dlx" style="padding:1%;">
        <br>
        <label for="add">User_id</label>
        <br>
        <input type="text" id="user_id" name="user_id" style="padding:1%;">
        <br>
        <input type="submit" value="submit" style="background-color:rgb(91,134,174); margin:5px;" class=" w3-button w3-round w3-text-white">
    </form>
    </div>

    <div class="w3-card w3-round" style="display:inline-block; vertical-align: middle; padding: 10px; text-align:center; width: 250px;">
    <h1 style="font-family:'TSHandwriting'">Edit Song</h1>
    
    <form name="edit" action ="admin/editSong.php" method="POST" style=" font-family:'Courier New', Courier, monospace;">
        <label for="edit">id</label>
        <br>
        <input type="text" id="user_id" name="user_id" style="padding:1%;">
        <br>
        <label for="edit">Vault</label>
        <br>
        <input type="text" id="vault" name="vault" style="padding:1%;">
        <br>
        <label for="edit">DLX</label>
        <br>
        <input type="text" id="dlx" name="dlx" style="padding:1%;">
        <br>
        <input type="submit" value="submit" style="background-color:rgb(91,134,174); margin:5px;" class=" w3-button w3-round w3-text-white">
    </form>
    </div>
</div>
</body>

<footer class="w3-panel w3-center w3-small w3-text-white" style="background-color: rgb(91,134,174); padding: 10px; font-family:'Courier New', Courier, monospace">
    <small>&copy;<?php echo date('Y');?> Sydney Barnett. Not actually Taylor Swift.</small>
</footer>
</html>