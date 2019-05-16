<?php

class Database
{
    private static $user = 'root';
    private static $pass = 'root';
    private static $db = 'dreamerblog';
    private static $dsn = 'mysql:host=localhost;dbname=dreamerblog';
    // private static $user = 'id9402172_dreamerblogger';
    // private static $pass = '13579dBP*';
    // private static $db = 'id9402172_dreamerblog';
    // private static $dsn = 'mysql:host=localhost;dbname=id9402172_dreamerblog';
    private static $dbcon;

    private function __construct()
    {
    }

    //get pdo connection
    public static function getDb(){
        if(!isset(self::$dbcon)) {
            try {
                self::$dbcon = new PDO(self::$dsn, self::$user, self::$pass);
                self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $msg = $e->getMessage();
                echo($msg);
                // include 'customerror.php';
                exit();
            }
        }
        return self::$dbcon;
    }
}