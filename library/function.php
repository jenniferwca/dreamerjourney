<?php

function validateForm($name,$email,$pass,$repass,$msg)
{
    if (empty($name)) {
        $msg .= "<b>* Please enter your username.</b><br/>";
    }
    if (empty($email)) {
        $msg .= "<b>* Please enter your email.</b><br/>";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg .= "<b>* Please enter valid email format.</b><br/>";
        }
    }
    if (empty($pass) || empty($repass)) {
        $msg .= "<b>* Please enter password and re-enter same password.</b><br/>";
    } else {
        if(!($_POST["pass"] == $_POST["repass"])){
            $msg .= "<b>* Password does not match, please try again.</b>";
        } 
    }
    return $msg;
}

function insertForm($name,$email,$pass,$msg)
{
    $username = mysqli_real_escape_string($connect, $name);
    $useremail = mysqli_real_escape_string($connect, $email);
    $userpass = mysqli_real_escape_string($connect, $pass);
    $userpass = password_hash($pass, 1);
    $sql = "INSERT INTO users (name,email,pass) VALUES('$username','$useremail','$userpass')";
    if(mysqli_query($connect,$sql))
    {
        $_SESSION['email'] = $email;
        header("location: blog_index.php");
    }
    return $msg;
}

function validateLoginForm($email,$pass,$msg)
{
    if (empty($email) || empty($pass)) 
    {
        $msg .= "<b>* Please enter your email and password.</b><br/>";
<<<<<<< HEAD
    } 
    else 
    {
        $connect = mysqli_connect("localhost","root","root","dreamerblog");
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $results = $connect->query($sql);
        
        if($results->num_rows > 0)
=======
    } else {
        $useremail = mysqli_real_escape_string($connect, $email);
        $userpass = mysqli_real_escape_string($connect, $pass);
        $userpass = md5($userpass);
        $sql = "SELECT * FROM users WHERE email = '$useremail' AND pass = '$userpass'";
        $result = mysqli_query($connect,$sql);
        if(mysqli_num_rows($result) > 0)
>>>>>>> b7014e36e3e8938346b3a4a22948b746a7a9040b
        {
            $data = $results->fetch_array();
            if(password_verify($pass,$data['pass']))
            {
                $_SESSION['email'] = $email;
                header("location: blog_index.php");
            }
        } else {
            $msg = "<b>* Incorrect email and password.</b>";
        }
    }
    return $msg;
}

function validateBlogForm($title,$content,$blog_msg)
{
    if (empty($title) || empty($content)) {
        $blog_msg .= "<b>Please enter blog title and content.</b>";
    }
    return $blog_msg;
}