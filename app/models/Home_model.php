<?php

class Home_model extends Model
{
    public function getAllBarang($start = 1)
    {
        $this->db->query("SELECT 
                barang.id_barang, 
                barang.nama_barang, 
                barang.harga_barang,
                barang.terjual,
                assets_barang.foto 
                FROM barang LEFT JOIN assets_barang 
                ON barang.id_barang = assets_barang.id_barang AND assets_barang.index = 1 LIMIT :start, :end");
        $this->db->bind("start", $start - 1);
        $this->db->bind("end", $start + 101);
        return $this->db->resultSet();
    }
    public function getCategory()
    {
        $this->db->query("SELECT 
                kategori.id_kategori,
                kategori.nama_kategori,
                assets_barang.foto
                FROM kategori 
                LEFT JOIN barang 
                ON barang.id_kategori = kategori.id_kategori 
                LEFT JOIN assets_barang 
                ON barang.id_barang = assets_barang.id_barang AND assets_barang.index = 1 
                GROUP BY kategori.id_kategori");
        return $this->db->resultSet();
    }
    public function getBarangById($id)
    {
        $this->db->query("SELECT 
                barang.*,
                user.id_user,
                user.username,
                user.avatar,
                kategori.*
                FROM barang INNER JOIN user
                ON barang.id_barang = :id AND barang.id_penjual = user.id_user 
                INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    public function getAssetBarangById($id)
    {
        $this->db->query("SELECT * FROM assets_barang WHERE id_barang = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }
    public function getUserAndCartById($id)
    {
        $this->db->query("SELECT user.avatar, cart.id_cart FROM user INNER JOIN cart ON user.id_user=:id AND cart.id_user = :id LIMIT 1");
        $this->db->bind("id", $id);
        return $this->db->single();
    }
    public function getAllBarangByKeyword($keyword, $start)
    {
        $this->db->query(
            "SELECT 
                barang.id_barang, 
                barang.nama_barang, 
                barang.harga_barang,
                barang.terjual,
                assets_barang.foto 
                FROM barang LEFT JOIN assets_barang 
                ON barang.id_barang = assets_barang.id_barang AND assets_barang.index = 1 WHERE barang.nama_barang REGEXP :keyword LIMIT :start, :end"
        );
        $this->db->bind("start", $start - 1);
        $this->db->bind("end", $start + 101);
        $this->db->bind("keyword", $keyword);
        return $this->db->resultSet();
    }
}
