<?php 

Class databarangModel {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    
    public function getAllBarang() {

        $query = "SELECT * FROM tb_barang ";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getDetailBarang($id) {

        $query = 'SELECT * FROM tb_barang WHERE id=:id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        
        return $this->db->single();

    }

    public function tambahDataBarang($data) {
        $query = "insert into tb_barang values (null, :nama_barang, :harga, :stok)";
        $this->db->query($query);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stok', $data['stok']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateBarang($data) {
        $query = "UPDATE tb_barang SET
                    nama_barang = :nama_barang,
                    harga = :harga,
                    stok = :stok
                WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteBarang($id){
        $query = "DELETE FROM tb_barang WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}