<?php
namespace Database{
    use \PDO;
    class DatabaseConnection{
        static function getConnection():\PDO{
            $host = 'localhost';
            $port = 3306;
            $dbName="todolist";
            $username = "root";
            $password = '';

            return new \PDO("mysql:host=$host:$port;dbname=$dbName",$username,$password);
        }
    }
}
?>