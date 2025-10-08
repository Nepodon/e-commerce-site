<?php
require_once 'config.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
class DBcontrol {
    public $mysqli;

    function __construct() {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($this->mysqli->connect_error) {
            die('Database connection error: ' . $this->mysqli->connect_error);
        }
    }

    // Optionally, add helper methods to proxy to $this->mysqli
    public function query($sql) {
        return $this->mysqli->query($sql);
    }
    public function prepare($sql) {
        return $this->mysqli->prepare($sql);
    }
    public function real_escape_string($str) {
        return $this->mysqli->real_escape_string($str);
    }
    public function close() {
        return $this->mysqli->close();
    }
    public function escape_string($str) {
        return $this->mysqli->real_escape_string($str);
    }
}
?>