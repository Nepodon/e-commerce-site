<?php 
require_once "DbControl.php";

class UserControl extends DbControl{

    /*
     * Summary of select
     * @param string $email
     * @param string $password
     * @return void
     */
    public function select(string $email): bool|mysqli_result{
        $select_query = "SELECT * FROM users WHERE email = ?";
        $this->stmt = $this->dbconn->prepare($select_query);
        $this->stmt->bind_param("s", $email);
        $this->stmt->execute();
        if($this->stmt->get_result() != false){
            return $this->stmt->get_result();
        } else{
            return false;
        }
        
    }
    /*public function update(string $type, string $colname,string $value): bool{
        $update_query = "UPDATE users WHERE  '$colname'= ?";
        $this->stmt = $this->dbconn->prepare($update_query);
        $this->stmt->bind_param($type, $value);
        $this->stmt->execute();
        if($this->stmt->get_result() != false){
            return true;
        }else{
            return false;
        }  
    }*/

}