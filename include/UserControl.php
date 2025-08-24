<?php

require_once 'DBcontrol.php';
$config = require_once 'config.php';

final class UserControl extends DBcontrol {
    public function getUserData($email = null) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $this->stmt = $this->conn->prepare($sql);
        if (!$this->stmt) return false;
        $this->stmt->bind_param("s", $email);
        $this->stmt->execute();
        $result = $this->stmt->get_result();
        if ($result ){
            return $result;
        }
        return false;
    }    
    public function insertUserData($username, $phone, $address, $email, $password_hash): bool{
        $sql = "INSERT INTO users (username, phone, address, email, password) VALUES (?, ?, ?, ?, ?)";

        $this->stmt = $this->conn->prepare($sql);
        if($this->stmt === false) {
            return false; // Prepare failed
        }
        $this->stmt->bind_param("sssss", $username, $phone, $address, $email, $password_hash);
        if($this->stmt->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function validUser($password, $password_hash): bool {
        return password_verify($password, $password_hash);
    }
    public function updatePassword($id,$email, $new_password_hash): bool {
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $this->stmt = $this->conn->prepare($sql);
        if ($this->stmt === false) {
            return false; // Prepare failed
        }
        $this->stmt->bind_param("si", $new_password_hash, $id);
        return $this->stmt->execute();
    }
    public function updateAddress($id, $new_address): bool {
        $sql = "UPDATE users SET address = ? WHERE id = ?";
        $this->stmt = $this->conn->prepare($sql);
        if ($this->stmt === false) {
            return false; // Prepare failed
        }
        $this->stmt->bind_param("si", $new_address, $id);
        return $this->stmt->execute();
    }
    public function updatePhone($id, $new_phone): bool {
        $sql = "UPDATE users SET phone = ? WHERE id = ?";
        $this->stmt = $this->conn->prepare($sql);
        if ($this->stmt === false) {
            return false; // Prepare failed
        }
        $this->stmt->bind_param("si", $new_phone, $id);
        return $this->stmt->execute();
    }
}