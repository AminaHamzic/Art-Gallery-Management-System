<?php

class GalleryDao
{
    private $connection;

    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=lab3_db", $username, $password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}