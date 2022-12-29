<?php

class Cart_model extends Model
{
    public function addCart($id_barang, $id_user)
    {
        $this->db->query("SELECT COUNT(*) AS count FROM cart WHERE id_user = :id_user AND id_barang = :id_barang");
        $this->db->bind("id_user", $id_user);
        $this->db->bind("id_barang", $id_barang);
        $res = $this->db->single();
        if ($res["count"] > 0) {
            throw new PDOException("Data Sudah Ada", 1);
        } else {
            $this->db->query("INSERT INTO cart (id_user, id_barang) VALUES (:id_user, :id_barang)");
            $this->db->bind("id_user", $id_user);
            $this->db->bind("id_barang", $id_barang);
            $this->db->execute();
        }
    }
    public function getUserAndCartById($id)
    {
        $this->db->query("SELECT user.avatar, cart.id_cart FROM user INNER JOIN cart ON user.id_user=:id AND cart.id_user = :id LIMIT 1");
        $this->db->bind("id", $id);
        return $this->db->single();
    }
    public function getAllBarangInCart($id)
    {
        $this->db->query("SELECT 
                barang.id_barang,
                barang.nama_barang,
                barang.id_penjual,
                barang.harga_barang,
                barang.satuan,
                cart.id_cart,
                assets_barang.foto 
                FROM barang INNER JOIN cart 
                ON cart.id_user = :id AND barang.id_barang = cart.id_barang 
                LEFT JOIN assets_barang 
                ON barang.id_barang = assets_barang.id_barang AND assets_barang.index = 1");
        $this->db->bind("id", $id);
        return $this->db->resultSet();
    }
}
