<?php

class ObatModel {
    private $table = 'tb_obat';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllObat()
    {
       $this->db->query('SELECT * FROM ' . $this->table);
       return $this->db->resultSet();
    }

    public function getObatById($id_obat)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_obat=:id_obat');
        $this->db->bind('id_obat', $id_obat);
        return $this->db->single();
    }

    public function addObat($obatData)
    {
        $query = "INSERT INTO $this->table (merk, nama, id_kategori, id_satuan, beli, jual, expired, stok, status) VALUES (:merk, :nama, :id_kategori, :id_satuan, :beli, :jual, :expired, :stok, :status)";

        $this->db->query($query);
        $this->db->bind('merk', $obatData['merk']);
        $this->db->bind('nama', $obatData['nama']);
        $this->db->bind('id_kategori', $obatData['id_kategori']);
        $this->db->bind('id_satuan', $obatData['id_satuan']);
        $this->db->bind('beli', $obatData['beli']);
        $this->db->bind('jual', $obatData['jual']);
        $this->db->bind('expired', $obatData['expired']);
        $this->db->bind('stok', $obatData['stok']);
        $this->db->bind('status', $obatData['status']);
        
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteObat($id_obat)
    {
        $query = "DELETE FROM $this->table WHERE id_obat = :id_obat";

        $this->db->query($query);
        $this->db->bind('id_obat', $id_obat);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateObat($obatData)
    {
        $query = "UPDATE $this->table SET merk = :merk, nama = :nama, id_kategori = :id_kategori, id_satuan = :id_satuan, beli = :beli, jual = :jual, expired = :expired, stok = :stok, status = :status WHERE id_obat = :id_obat";

        $this->db->query($query);
        $this->db->bind('merk', $obatData['merk']);
        $this->db->bind('nama', $obatData['nama']);
        $this->db->bind('id_kategori', $obatData['id_kategori']);
        $this->db->bind('id_satuan', $obatData['id_satuan']);
        $this->db->bind('beli', $obatData['beli']);
        $this->db->bind('jual', $obatData['jual']);
        $this->db->bind('expired', $obatData['expired']);
        $this->db->bind('stok', $obatData['stok']);
        $this->db->bind('status', $obatData['status']);
        $this->db->bind('id_obat', $obatData['id_obat']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
