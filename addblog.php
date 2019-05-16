<?php
require_once 'database.php';
require_once 'Blog.php';

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $db = Database::getDB();
    $b = new Blog();
    $blogs = $b->insertBlog($title,$content,$db);

    if($c){
        echo "Saved blog sucessfully";
    } else {
        echo "Error creating blog.";
    }
}