<?php
namespace Database{
    use \PDO;
    class DatabaseConection{
        static function getConnection():\PDO{
            $host = 'localhost';
            $port = 3306;
            $dbName="todolist";
            $username = "root";
            $password = '';

            return \PDO("mysql:host=$host:port=$port;dbname=$dbName",$username,$password);
        }
    }
}
?>