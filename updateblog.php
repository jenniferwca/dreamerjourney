<?php 
require_once 'library/database.php';
require_once 'Blog.php';

session_start();

if(isset($_POST['update'])){
    $id = $_POST['id'];
    
    $dbcon = Database::getDB();
    $b = new Blog();
    $blog = $b->getBlogById($id,$dbcon);
}

if(isset($_POST['updblog'])){
    $id= $_POST['bid'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $dbcon = Database::getDb();
    $b = new Blog();
    $count = $b->updateBlog($id, $title, $content, $dbcon);

    if($count){
        header("Location: detail.php?id=$id");
    } else {
        echo  "Update error.";
    }
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
<body class="edit_page">
    <div class="edit_header">
            <h2>Edit Blog</h2>
            <a class="edit_back" href="blog_index.php">Back</a>
    </div>
    <div class="edit_section">
        <form action="" method="post">
            <input type="hidden" name="bid" value="<?= $blog->blog_id; ?>" />
            <p>Title: </p>
            <input type="text" name="title" class="input_title" value="<?= $blog->title; ?>" /><br/>
            <p>Content: </p>
            <textarea type="text" name="content" class="input_content" value="<?= $blog->content; ?>"></textarea><br/>
            <button type="submit" name="updblog" value="UpdateBlog" class='save_btn'>Save</button>
        </form>
    </div>
    <?php
      include "footer.php"
    ?>
</body>