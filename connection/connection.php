<?php
class connection {
    public static $conn = null;

    private function __construct()
    {

    }

    public static function dbConnect()
    {
        if (self::$conn !== null) {
            return self::$conn;
        }

        $server_host = "mysql";
        $database = "api";
        $username = "root";
        $password = "root";

        $dsn= "mysql:host=$server_host;dbname=$database";

        try{
            // create a PDO connection with the configuration data
            self::$conn = new PDO($dsn, $username, $password);
            // set the PDO error mode to exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            // report error message
            echo $e->getMessage();
        }

        return self::$conn;
    }
}
