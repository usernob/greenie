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
                        FROM user INNER JOIN cart ON user.id_user=:id AND cart.id_user = :id LIMIT 1");
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
}
