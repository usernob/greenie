<?php

class Home_model extends Model
{
    public function getAllBarang()
    {
        $this->db->query("SELECT 
                barang.id_barang, 
                barang.nama_barang, 
                barang.harga_barang,
                assets_barang.foto 
                FROM barang LEFT JOIN assets_barang 
                ON barang.id_barang = assets_barang.id_barang AND assets_barang.index = 1 LIMIT 100");
        return $this->db->resultSet();
    }

    public function getUserById($id, $column = "*")
    {
        $this->db->query("SELECT $column FROM user WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->single();
    }
}
