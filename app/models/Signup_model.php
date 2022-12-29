<?php

class Signup_model extends Model
{
    public function get($key, $value)
    {
        $this->db->query("SELECT COUNT(*) as total FROM user WHERE $key=:value");
        $this->db->bind("value", $value);
        return $this->db->single();
    }
    public function newSignup($data)
    {
        $password = password_hash($data["password"], PASSWORD_DEFAULT);
        $this->db->query("INSERT INTO user (username, email, password, no_hp) VALUES (:username, :email, :password, :no_hp)");
        $this->db->bind("username", $data["username"]);
        $this->db->bind("email", $data["email"]);
        $this->db->bind("password", $password);
        $this->db->bind("no_hp", $data["no_hp"]);
        $this->db->execute();
        return $this->select($data["username"], $data["email"]);
    }
    public function select($username, $email)
    {
        $this->db->query("SELECT id_user FROM user WHERE username=:username AND email=:email");
        $this->db->bind("username", $username);
        $this->db->bind("email", $email);
        return $this->db->single();
    }
}
