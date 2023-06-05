<?php 

class Asal
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function showAsal()
    {
        $this->db->query('SELECT * FROM asal order by asal');

        $result = $this->db->resultSet();

        return $result;
    }

    public function tambah($data)
    {
        $this->db->query('INSERT INTO asal(asal) VALUES (:asal)');
        
        $this->db->bind(':asal', $data['asal']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM asal WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
}