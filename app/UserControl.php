<?php

require_once 'DBcontrol.php';

final class UserControl extends DBcontrol {
    public function getUserData($email): bool | mysqli_result {
        $email = $this->mysqli->real_escape_string($email);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $res = $this->mysqli->query($sql);
        return $res;
    }   
    public function isValidUser($email): bool {
        $email = $this->mysqli->real_escape_string($email);
        $sql = "SELECT id FROM users WHERE email = '$email'";
        $res = $this->mysqli->query($sql);
        if($res && $res->num_rows > 0) {
            return true;
        } 
        return false;
    }
    public function checkPassword($password, $password_hash): bool {
        return password_verify($password, $password_hash);
    }
    public function insertUserData($username, $phone, $address, $email, $password_hash): mixed{
        $sql = "INSERT INTO users (name, phone, address, email, password) VALUES (?, ?, ?, ?, ?)";

        $this->stmt = $this->mysqli->prepare($sql);
        if($this->stmt === false) {
            return false; // Prepare failed
        }
        $this->stmt->bind_param("sssss", $username, $phone, $address, $email, $password_hash);
        $this->stmt->execute();
        return $this->stmt->insert_id;
    }

    public function updatePassword($id, $new_password_hash): bool {
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $this->stmt = $this->mysqli->prepare($sql);
        if ($this->stmt === false) {
            return false; // Prepare failed
        }
        $this->stmt->bind_param("si", $new_password_hash, $id);
        $res =  $this->stmt->execute();
        return $res;
    }
    public function updateAddress($id, $new_address): bool {
        $sql = "UPDATE users SET address = ? WHERE id = ?";
        $this->stmt = $this->mysqli->prepare($sql);
        if ($this->stmt === false) {
            return false; // Prepare failed
        }
        $this->stmt->bind_param("si", $new_address, $id);
        $res =  $this->stmt->execute();
        return $res;
    }
    public function updatePhone($id, $new_phone): bool {
        $sql = "UPDATE users SET phone = ? WHERE id = ?";
        $this->stmt = $this->mysqli->prepare($sql);
        if ($this->stmt === false) {
            return false; // Prepare failed
        }
        $this->stmt->bind_param("si", $new_phone, $id);
        $res =  $this->stmt->execute();

        return $res;
    }
}

return new UserControl();