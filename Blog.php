<?php 

class Blog
{
    public function getAllBlogs($dbcon)
    {
        $sql = "SELECT * FROM blogs";
        $pst = $dbcon->prepare($sql);
        $pst->execute();
        $blogs = $pst->fetchAll(PDO::FETCH_OBJ);

        return $blogs;
    }
    
    public function insertBlog($title,$content,$db)
    {
        $sql = "INSERT INTO blogs(title,content) 
        values(:title,:content)";
        $pst = $db->prepare($sql);
        $pst->bindParam(':title', $title);
        $pst->bindParam(':content', $content);
        $count = $pst->execute();

        if($count){
            header("Location: blog_index.php");
        }else{
            $message = 'Failed...';
        }
        return $message;
    }
    
    public function getBlogById($id, $db){
        $sql = "SELECT * FROM blogs WHERE blog_id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();

        $blog =  $pst->fetch(PDO::FETCH_OBJ);

        return $blog;
    }
    
    public function updateBlog($id,$title,$content,$db){
        $sql = "UPDATE blogs
                SET title = :title,
                content = :content
                WHERE blog_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':title', $title);
        $pst->bindParam(':content', $content);

        $count = $pst->execute();
        return $count;
    }
    
    public function deleteBlog($id, $db){
        $sql = "DELETE FROM blogs WHERE blog_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        return $count;
    }
    
}