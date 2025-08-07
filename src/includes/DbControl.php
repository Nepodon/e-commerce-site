<?php

require_once "config.php";

class DbControl extends mysqli{
    protected mysqli_stmt $stmt;
    protected $dbconn;  
    public function __construct(string $host, string $user, string $passwd, string $db){
        try{
            $this->dbconn = new mysqli($host, $user, $passwd, $db);
        } catch(mysqli_sql_exception $e){
            die("Exception occured: ". $e->getMessage());
        }
    }
    public function __destruct(){
        $this->stmt->close();
        $this->dbconn->close();
        print("Mysqli stmt closed.\n");
        print("Connetion closed.\n");
    }
}