<?php
require_once 'config.php';
class DBcontrol extends mysqli{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $db = DB_NAME;
    protected $mysqli; // Mysqli connection  to db
    protected $stmt;   
    function __construct()
    {   
        $this->mysqli =  new mysqli($this->host, $this->user, $this->password, $this->db);
        if($this->connect_error){
            print('Connection Failed\n Error Message: '. $this->connect_error);
        }
    }
}
?>