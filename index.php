<?php
require_once 'database.php';
session_start();

?>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Dreamer's Journey</title>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="style/index.css"/>
    <link href="https://fonts.googleapis.com/css?family=Codystar|Dosis:300,400,600" rel="stylesheet">
  </head>
    <body class="login_page">
        <h1 class="login_header">Dreamer's Journey</h1>
        <p class="login_tagline">For dreamers to blog and be inspired by the great universe.</p>
        <div class="signin_container">
            <a href="login.php"><h3>Login/Register</h3></a>
        </div>
    </body>
</html>