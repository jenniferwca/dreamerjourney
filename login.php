<?php

require_once 'library/function.php';

$msg = "";
$name = "";
$email = "";
$pass = "";
$repass = "";

session_start();

if(isset($_POST["register"]))
{
    $name = filter_input(INPUT_POST,'name');
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $pass = filter_input(INPUT_POST,'pass');
    $repass = filter_input(INPUT_POST,'repass');

    $msg = validateForm($name,$email,$pass,$repass,$msg);
    if (empty($msg)){
        $msg = insertForm($name,$email,$pass,$msg);
    }
}
if(isset($_POST["login"]))
{
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $pass = filter_input(INPUT_POST,'pass');

    $msg = validateLoginForm($email,$pass,$msg);
    if (empty($msg)){
        $msg = validateLoginForm($email,$pass,$msg);
    }
}
?>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Dreamer's Journey Signin/Register</title>
    <link rel="shortcut icon" href="style/dicon.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Codystar|Dosis:300,400,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/login.css"/>
    <link rel="stylesheet" type="text/css" href="style/no_ad.css"/>
  </head>
    <body class="loginr_page">
        <h1>Dreamer's Journey</h1>
        <div class="loginr_container">
<?php
if(isset($_GET["action"]) == "login")
{
?>
        <div class="input_form">
        <a href="login.php"><h3 class="second">Register</h3></a><h3 class="prim">Login</h3>
        <p class="message"><?= $msg ?><p>
            <form method="post">
                <input type="text" name="email" class="logintext" placeholder="Enter email"/><br/>
                <input type="password" name="pass" class="logintext" placeholder="Enter password"/><br/>
                <input type="submit" name="login" value="Login"/><br/>
            </form>
        </div>
<?php
} else {
?> 
        <div class="input_form">
        <h3 class="prim">Register</h3><a href="login.php?action=login"><h3 class="second">Login</h3></a>
        <p class="message"><?= $msg ?><p>
            <form method="post">
                <input type="text" name="name" class="logintext" placeholder="Enter username"/><br/>
                <input type="text" name="email" class="logintext" placeholder="Enter email"/><br/>
                <input type="password" name="pass" class="logintext" placeholder="Enter password"/><br/>
                <input type="password" name="repass" class="logintext" placeholder="Re-enter password"/><br/>
                <input type="submit" name="register" value="Register"/><br/>
            </form>
        </div>
<?php
}
?>
        </div>
        <?php
            include "footer.php"
        ?>
    </body>
</html>