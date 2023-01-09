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
    public function deleteCart($id_cart)
    {
        $this->db->query("DELETE FROM cart WHERE id_cart = :id_cart");
        $this->db->bind("id_cart", $id_cart);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getUserAndCartById($id)
    {
        $this->db->query("SELECT user.avatar, cart.id_cart FROM user LEFT JOIN cart ON cart.id_user = user.id_user WHERE user.id_user = :id LIMIT 1");
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
    public function getSelectedCart($list_id_cart)
    {
        $list_condition = [];
        $query = "SELECT cart.id_cart, cart.id_barang, barang.nama_barang, barang.harga_barang FROM cart LEFT JOIN barang ON cart.id_barang = barang.id_barang WHERE ";
        for ($i = 0; $i < count($list_id_cart); $i++) {
            array_push($list_condition, "cart.id_cart = ?");
        }
        $condition = join(" OR ", $list_condition);
        $this->db->dbh->beginTransaction();
        $this->db->query($query . $condition);
        $this->db->stmt->execute($list_id_cart);
        $this->db->dbh->commit();
        return $this->db->resultSet();
    }
}
