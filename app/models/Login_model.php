<?php

class Login_model extends Model
{
    public function checkLogin($data)
    {
        $this->db->query(
            "SELECT 
            user.id_user,
            user.password,
            admin.id_user as id_admin,
            penjual.id_user as id_penjual
            FROM user 
            LEFT JOIN admin ON admin.id_user = user.id_user
            LEFT JOIN penjual ON penjual.id_user = user.id_user
            WHERE email=:email"
        );
        $this->db->bind("email", $data["email"]);
        return $this->db->single();
    }
}
