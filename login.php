<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Login</title>
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
<body style="height:100%; margin: 0px;">
    <header class="header">
        <div class="header-left">
            <a href="home.php">1989</a>
        </div>
        <div class="header-center">
            <a href="home.php">Taylor Swift</a>
        </div>
        <div class="header-right">
            <a href="register.php">Register</a>
        </div>
    </header>
    <div style="display: flex; justify-content:space-evenly; align-items: center;">
    <div  class="w3-container" style=" display:inline-block; vertical-align: middle;">
    <img src="assets/pink.jpg" style="height: 600px; padding: 20px;">
    </div>
    
    <div class="w3-card w3-round" style="display:inline-block; vertical-align: middle; padding: 10px; text-align:center">
    <h1 style="font-family:'TSHandwriting'">Login</h1>
    
    <form name="login" action ="login_process.php" method="POST" style=" font-family:'Courier New', Courier, monospace;">
        <label for="login">Username</label>
        <input type="text" id="username" name="username" style="padding:1%;">
        <br>
        <label for="login">Password</label>
        <input type="password" id="password" name="password" style="padding:1%;">
        <br>
        <input type="submit" value="submit" style="background-color:rgb(91,134,174); margin:5px;" class=" w3-button w3-round w3-text-white">
    </div>

    </div>
</body>

<footer class="w3-panel w3-center w3-small w3-text-white" style="vertical-align: middle; width: 100%; position: absolute; bottom: 0;background-color: rgb(91,134,174); padding: 10px; font-family:'Courier New', Courier, monospace">
    <small>&copy;<?php echo date('Y');?> Sydney Barnett. Not actually Taylor Swift.</small>
</footer>
</html>