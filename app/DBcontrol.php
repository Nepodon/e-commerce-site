<?php
require_once 'config.php';
class DBcontrol extends mysqli{
    private $host = host;
    private $user = user;
    private $password = password;
    private $db = db;
    protected $mysqli; // Mysqli connection  to db
    protected $stmt;   
    function __construct()
    {   
        $this->mysqli =  new mysqli($this->host, $this->user, $this->password, $this->db);
        if($this->connect_error){
            die('Connection Failed\n Error Message: '. $this->connect_error);
        }
    }
}
?>