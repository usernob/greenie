<?php

class Login_model extends Model
{
    public function checkLogin($data)
    {
        $this->db->query("SELECT id, password FROM user WHERE email=:email");
        $this->db->bind("email", $data["email"]);
        return $this->db->single();
    }
}
