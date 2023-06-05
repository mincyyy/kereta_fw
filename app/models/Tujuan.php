<?php 

class Tujuan
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function showTujuan()
    {
        $this->db->query('SELECT * FROM tujuan order by tujuan');

        $result = $this->db->resultSet();

        return $result;
    }

    public function tambah($data)
    {
        $this->db->query('INSERT INTO tujuan(tujuan) VALUES (:tujuan)');
        
        $this->db->bind(':tujuan', $data['tujuan']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM tujuan WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
}