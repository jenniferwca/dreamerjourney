<?php
require_once 'library/database.php';
session_start();

if(!isset($_SESSION['email'])){
    header("Location: login.php?action=login");
}


?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Dreamer's Journey</title>
    <link rel="shortcut icon" href="style/dicon.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="style/blog_index.css"/>
    <link rel="stylesheet" type="text/css" href="style/no_ad.css"/>
    <link href="https://fonts.googleapis.com/css?family=Codystar|Dosis:300,400,600" rel="stylesheet">
</head>
    <body class="index_page">
        <div class="header">
            <h1>Reignite the dreamer in you</h1>
            <div class="logout_sec">
            <?php
                echo '<a class="pwlogout" href="logout.php">Logout</a>';
            ?>
            </div>
        </div>
    <div class="container">
        <div class="listblog">
        <button type="submit" id="oldblogs" class='old_btn'>JOURNEY</button>
            <div class="bloglist_section">
            <?php 
                include "listblog.php";
            ?>
            </div>
        </div>
        <div class="blog_input">
            <h3>NEW BLOG</h3>
            <form method="post" action="addblog.php">
                <input class="input_title" type="text" name="title" placeholder="Title"/> <br/>
                <textarea class="input_content" type="text" name="content" placeholder="Content"></textarea><br/>
                <button type="submit" name="save" class='save_btn'>Save</button>
            </form>
        </div>
        <div class="nasa_container">
            <div class="image_container">
                <div id="image"></div>
                <button type="submit" id="moreinfo" class='learn_btn'>Learn more</button>
                <div class="nasainfo">
                    <h1 id="title"></h1>
                    <p id="explanation"></p>
                    <p id="copyright"></p>
                </div>
            </div>
        </div>
    </div>
    <?php
      include "footer.php"
    ?>
    </body>
</html>