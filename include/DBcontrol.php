<?php
class DBcontrol extends mysqli{
    protected $conn; // Mysqli connection  to db
    protected $stmt;   
    function __construct($host, $user, $passwd, $db)
    {   
        $this->conn =  new mysqli($host, $user,$passwd, $db);
        if($this->connect_error){
            die('Connection Failed\n Error Message: '. $this->connect_error);
        }
    }
    function __destruct() {
        if ($this->stmt) {
            $this->stmt->close();
        }
        if ($this->conn) {
            $this->conn->close();
        }
    }

}
?>