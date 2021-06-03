<?php

class Db {
    private $hostName;
    private $username;
    private $password;
    private $dbName;
    private $charset;

    protected function connect() {
        $this->hostName = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbName = "school";
        $this->charset = "utf8mb4";

        try {
            $dsn = "mysql:host=" . $this->hostName . ";dbname;" . $this->dbName . ";charset=" . $this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
