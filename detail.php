<?php 
require_once 'database.php';
require_once 'Blog.php';
session_start();

$id = $_GET['id'];

$dbcon = Database::getDB();
$b = new Blog();
$myblog = $b->getBlogById($id,$dbcon);

?>
<html lang="en">
  <head>
        <meta charset="utf-8" />
        <title>Dreamer's Journey</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/script.js"></script>
        <link rel="stylesheet" type="text/css" href="style/blog_index.css"/>
        <link href="https://fonts.googleapis.com/css?family=Codystar|Dosis:300,400,600" rel="stylesheet">
</head>
<body class="detail_page">
    <div class="detail_header">
        <div class="detail_title">
            <h2><?= $myblog->title; ?></h2>
        </div>
            <form method="post" action="updateblog.php">
                <input type="hidden" value= "<?= $myblog->blog_id; ?>" name="id"/>
                <input type="submit" value='Edit' name='update' class='edit_btn'/>
            </form>
            <form method="post" action="deleteblog.php">
                <input type="hidden" value= "<?= $myblog->blog_id; ?>" name="id"/>
                <input type="submit" value='Delete' name='delete' class='delete_btn'/>
            </form>
        <a href="blog_index.php">Back</a>
    </div>  
    <div class="detail_content">
        <p><?= $myblog->content; ?></p>
    </div>
    <?php
      include "footer.php"
    ?>
<body>