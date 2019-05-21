<?php 
require_once 'library/database.php';
require_once 'Blog.php';


$dbcon = Database::getDB();
$b = new Blog();
$myblog = $b->getAllBlogs($dbcon);

foreach($myblog as $blog){
    echo "<form action='detail.php?id=$blog->blog_id' method='post'>" .
         "<input type='hidden' value='$blog->blog_id' name='id' />".
         "<a class='listofblog' href='detail.php?id=$blog->blog_id'>".$blog->title."</a>".
         "</form>";
};