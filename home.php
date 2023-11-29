<?php
 session_start();
   
 if (!isset($_SESSION['username'])) {
     header('location: login.php');
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
    <title>Home</title>
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
        <div style="display: flex; justify-content:space-evenly; align-items: center;">
            <img src="assets/blue.jpg" alt="Taylor Swift in blue outfit" style="width: 30%; padding: 20px;">
            <div style="flex-direction:column; padding: 20px">
            <h1 style="text-align: absolute; font-size: 60; font-family: 'TSHandwriting';">My name is Taylor Swift, and I was born in 1989!</h1>
            <p style="font-family:'Courier New', Courier, monospace; text-align: relative;">I'll always be so incredibly grateful for how you loved and embraced this album. You, who followed my zig zag creative 
                choices and cheered on my risks and experiments. You, who heard the wink and humor in “Blank Space” and maybe even
                empathized with the pain behind the satire. You, who saw the seeds of allyship and advocating for equality in 
                “Welcome to New York.” You, who knew that maybe a girl who surrounds herself with female friends in adulthood 
                is making up for a lack of them in childhood (not starting a tyrannical hot girl cult). You, who saw that I 
                reinvent myself for a million reasons, and that one of them is to try my very best to entertain you. You, 
                who have had the grace to allow me the freedom to change. <br><br>1989 (Taylor's Version) Prologue</p>
            </div>
            <img src="assets/orange.jpg" alt="Taylor Swift in orange outfit" style="width: 30%; padding: 20px;">
        </div>
    <div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between;">
    <div class="w3-container" style="margin: 10px; display:inline-block; vertical-align: middle;">
        <h2 style="font-family: 'TSHandwriting';">The rest of the world was black and white... and we were in screaming color!</h2>
    <form method="POST" style="font-family:'Courier New', Courier, monospace">
    <p>
        <label>Favorite 1989 Taylor's Version Album: </label>
        <input class="w3-radio" type="radio" name='TvAlbum' value="Rose Garden Pink">
        <label>Rose Garden Pink</label>

        <input class="w3-radio" type="radio" name='TvAlbum' value="Sunset Boulevard Yellow">
        <label>Sunset Boulevard Yellow</label>

        <input class="w3-radio" type="radio" name='vAlbum' value="Aquamarine Green">
        <label>Aquamarine Green</label>

        <input class="w3-radio" type="radio" name='TvAlbum' value="Standard Blue">
        <label>Standard Blue</label>
    </p>
    <p>
        <label>Favorite Eras Tour Dress: </label>
        <input class="w3-radio" type="radio" name="ErasDress" value="Pink">
        <label>Pink</label>

        <input class="w3-radio" type="radio" name="ErasDress" value="Orange">
        <label>Orange</label>

        <input class="w3-radio" type="radio" name="ErasDress" value="Green">
        <label>Green</label>

        <input class="w3-radio" type="radio" name="ErasDress" value="Blue">
        <label>Blue</label>
    </p>
    <button style="background-color:rgb(91,134,174)" class="w3-button w3-block w3-round w3-text-white">Submit</button>
    </form>
    
    <?php
        if(isset($_POST["TvAlbum"])){
            $album = $_POST["TvAlbum"];
            echo '<p style="font-family:monospace;">Favorite 1989 Taylor\'s Version Album Cover:' . $_POST["TvAlbum"] . '</p>';
        }
        else{
            echo "<p style=\"font-family:monospace;\">Favorite 1989 Taylor's Version Album Cover: Not provided</p>";
        }
        if(isset($_POST["ErasDress"])){
            $dress = $_POST["ErasDress"];
            echo '<p style="font-family:monospace;">Favorite 1989 Eras Tour Dress: ' . $_POST["ErasDress"] . '</p>';
        }
        else{
            echo '<p style="font-family:monospace;">Favorite 1989 Eras Tour Dress: Not provided</p>';
        }

        $dsn = 'mysql:host=localhost;dbname=project';
        $username_db = 'root';
        $password_db = 'root';
    
        try {
            $pdo = new PDO($dsn, $username_db, $password_db);
        } 
        catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    
        $username = $_SESSION['username'];
    
        $sql = "SELECT id FROM registration WHERE username = '$username'";
        $statement = $pdo->prepare($sql);
        $id = $statement->execute();
    
        $sql = "INSERT INTO color (album, dress, user_id) VALUES (:album, :dress, :id)";
        $statement = $pdo->prepare($sql);
    
        $statement->bindParam(':album', $album);
        $statement->bindParam(':dress', $dress);
        $statement->bindParam(':id', $id);
        $statement->execute();
    ?>
    </div>
    <div class="w3-container" style="margin: 10px; display:inline-block; vertical-align: middle;">
        <img src="assets/gulls.png" alt="Seagulls" style="display:flex; width: 75%;">
    </div>
    <div class="w3-container" style="margin: 10px; display:inline-block; vertical-align: middle;">
        <h2 style="font-family: 'TSHandwriting';">Haven't you heard what becomes of curious minds?</h2>
    <form method="POST" style="font-family:'Courier New', Courier, monospace">
    <p>
        <label>Favorite From the Vault Track: </label>
        <input class="w3-radio" type="radio" name="Vault" value="Slut!">
        <label>Slut!</label>

        <input class="w3-radio" type="radio" name="Vault" value="Say Don't Go">
        <label>Say Don't Go</label>

        <input class="w3-radio" type="radio" name="Vault" value="Now That We Don't Talk">
        <label>Now That We Don't Talk</label>

        <input class="w3-radio" type="radio" name="Vault" value="Suburban Legends">
        <label>Suburban Legends</label>

        <input class="w3-radio" type="radio" name="Vault" value="Is It Over Now?">
        <label>Is It Over Now?</label>
    </p>
    <p>
        <label>Favorite Original Deluxe Song: </label>
        <input class="w3-radio" type="radio" name="DLX" value="Wonderland">
        <label>Wonderland</label>

        <input class="w3-radio" type="radio" name="DLX" value="You Are in Love">
        <label>You Are in Love</label>

        <input class="w3-radio" type="radio" name="DLX" value="New Romantics">
        <label>New Romantics</label>
    </p>

    <button style="background-color:rgb(91,134,174)" class="w3-button w3-block w3-round w3-text-white">Submit</button>
    </form>
    <?php
        if(isset($_POST["Vault"])){
            $vault = $_POST['Vault'];
            echo '<p style="font-family:monospace;">Favorite 1989 From the Vault Song: ' . $_POST["Vault"] . '</p>';
        }
        else{
            echo "<p style=\"font-family:monospace;\">Favorite 1989 From the Vault Song: Not provided</p>";
        }
    
        if(isset($_POST["DLX"])){
            $dlx = $_POST['DLX'];
            echo '<p style="font-family:monospace;">Favorite Original 1989 Deluxe Song: ' . $_POST["DLX"] . '</p>';
        }
        else{
            echo '<p style="font-family:monospace;">Favorite Original 1989 Deluxe Song: Not provided</p>';
        }

        $dsn = 'mysql:host=localhost;dbname=project';
        $username_db = 'root';
        $password_db = 'root';
    
        try {
            $pdo = new PDO($dsn, $username_db, $password_db);
        } 
        catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }

        $username = $_SESSION['username'];

        $sql = "SELECT id FROM registration WHERE username = '$username'";
        $statement = $pdo->prepare($sql);
        $id = $statement->execute();
    
        $dsn = 'mysql:host=localhost;dbname=project';
        $username_db = 'root';
        $password_db = 'root';
    
        try {
            $pdo = new PDO($dsn, $username_db, $password_db);
        } 
        catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }

        $sql = "SELECT id FROM registration WHERE username = '$username'";
        $statement = $pdo->prepare($sql);
        $id = $statement->execute();
    
        $sql = "INSERT INTO song (vault, dlx, user_id) VALUES (:vault, :dlx, :id)";
        $statement = $pdo->prepare($sql);
    
        $statement->bindParam(':vault', $vault);
        $statement->bindParam(':dlx', $dlx);
        $statement->bindParam(':id', $id);
    
        $statement->execute();
    ?>
    </div>
    </div>
</body>

<footer class="w3-panel w3-center w3-small w3-text-white" style="background-color: rgb(91,134,174); padding: 10px; font-family:'Courier New', Courier, monospace">
    <small>&copy;<?php echo date('Y');?> Sydney Barnett. Not actually Taylor Swift.</small>
</footer>
</html> 