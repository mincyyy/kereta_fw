<?php 

class Destination
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function showHarga()
    {
        $this->db->query('SELECT harga.id, asal, tujuan, harga from harga join tujuan on (harga.tujuan_id=tujuan.id)
        join asal on (harga.asal_id=asal.id) order by harga.id');

        $result = $this->db->resultSet();

        return $result;
    }

    public function showUser()
    {
        $this->db->query('SELECT id, username, nama, email, saldo, status FROM user order by id');

        $result = $this->db->resultSet();

        return $result;
    }

    public function tambah($data)
    {
        $this->db->query("INSERT INTO harga (id, asal_id, tujuan_id, harga) VALUES (NULL, :asal_id, :tujuan_id, :harga)");
        
        $this->db->bind(':asal_id', $data['asal_id']);
        $this->db->bind(':tujuan_id', $data['tujuan_id']);
        $this->db->bind(':harga', $data['harga']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function pilihdariId($id)
    {
        $this->db->query('SELECT * FROM harga WHERE id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function pilihdariIdUser($id)
    {
        $this->db->query('SELECT * FROM user WHERE id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function edit($data)
    {
        $this->db->query('UPDATE harga SET asal_id = :asal_id, tujuan_id = :tujuan_id, harga = :harga WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':asal_id', $data['asal_id']);
        $this->db->bind(':tujuan_id', $data['tujuan_id']);
        $this->db->bind(':harga', $data['harga']);

        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM harga WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function deleteUser($id)
    {
        $this->db->query('DELETE FROM user WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function search($search)
    {
        $this->db->query("SELECT * FROM user WHERE username LIKE '%$search%' ");

        $this->db->bind(':search', $search);

        $result = $this->db->resultSet();

        return $result;
    }

    public function search2($search2)
    {
        $this->db->query("SELECT harga.id, asal, tujuan, harga from harga join tujuan on (harga.tujuan_id=tujuan.id)
        join asal on (harga.asal_id=asal.id) where asal like '%$search2%' or tujuan like '%$search2%' order by harga.id");

        $this->db->bind(':search2', $search2);

        $result = $this->db->resultSet();

        return $result;
    }

    public function readAsal()
    {
        $this->db->query('SELECT * FROM asal');

        $result = $this->db->resultSet();

        return $result;
    }

    public function readTujuan()
    {
        $this->db->query('SELECT * FROM tujuan');

        $result = $this->db->resultSet();

        return $result;
    }
}
