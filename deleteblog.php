<?php 
require_once 'database.php';
require_once 'Blog.php';

session_start();


if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $b = new Blog();
    $count = $b->deleteBlog($id, $dbcon);

    if($count){
        header("Location: blog_index.php");
    }
}