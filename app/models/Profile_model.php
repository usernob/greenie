<?php

class Profile_model extends Model
{
    public function getUserAndCartById($id)
    {
        $this->db->query("SELECT 
                        user.username,
                        user.avatar,
                        user.email,
                        user.no_hp,
                        cart.id_cart 
                        FROM user LEFT JOIN cart ON cart.id_user = user.id_user WHERE user.id_user = :id LIMIT 1");
        $this->db->bind("id", $id);
        return $this->db->single();
    }
    public function updateUser($id, $post)
    {
        $this->db->query("UPDATE user SET username = :username, email = :email, no_hp = :no_hp WHERE user.id_user = :id");
        $this->db->bind("id", $id);
        $this->db->bind("username", $post["username"]);
        $this->db->bind("email", $post["email"]);
        $this->db->bind("no_hp", $post["no_hp"]);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updateAvatar($id, $image)
    {
        $this->db->query("UPDATE user SET avatar = :avatar WHERE user.id_user = :id");
        $this->db->bind("id", $id);
        $this->db->bind("avatar", $image, PDO::PARAM_LOB);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getPassword($id)
    {
        $this->db->query("SELECT password FROM user WHERE id_user = :id");
        $this->db->bind("id", $id);
        return $this->db->single();
    }
    public function updatePassword($id, $post)
    {
        $new = password_hash($post["new_pw"], PASSWORD_DEFAULT);
        $this->db->query("UPDATE user SET password = :new WHERE id_user = :id");
        $this->db->bind("new", $new);
        $this->db->bind("id", $id);
        return $this->db->execute();
    }

    public function getAddress($id)
    {
        $this->db->query('SELECT address.*, user.id_address as selected FROM `address` INNER JOIN user ON address.id_user = :id AND user.id_user = :id');
        $this->db->bind("id", $id);
        return $this->db->resultSet();
    }
    public function changeUserAddress($id_address, $id_user)
    {
        $this->db->query("UPDATE user SET id_address = :id_address WHERE id_user = :id_user");
        $this->db->bind("id_address", $id_address);
        $this->db->bind("id_user", $id_user);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function addUserAddress($id, $post)
    {
    }
}
