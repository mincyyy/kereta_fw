<?php 

class Pengguna
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function pilihdariId($id)
    {
        $this->db->query('SELECT * FROM harga WHERE id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function showProfile($username)
    {
        $this->db->query("SELECT * FROM user WHERE username = '$username' ");

        $result = $this->db->single();

        return $result;
    }

    public function showTiket()
    {
        $this->db->query("SELECT harga.id, asal, tujuan, harga from harga join tujuan on (harga.tujuan_id=tujuan.id) join asal on (harga.asal_id=asal.id) where asal.id=:asal_id && tujuan.id=tujuan_id order by harga.id");

        $result = $this->db->single();

        return $result;
    }

    public function pesanTiket()
    {
        $this->db->query("INSERT INTO transaksi(asal_id, tujuan_id, tanggal_transaksi) VALUES (':user_id', ':destinasi_id', '(now)')");
        $_SESSION['saldo'] -= $_SESSION['harga'];
        $this->db->query("UPDATE user SET saldo=$_SESSION[saldo] where id=$_SESSION[id]");

        $result = $this->db->single();
        $result = $this->db->single();

        return $result;
        return $result;
    }

    public function showTransaksiPengguna()
   {
       $this->db->query("SELECT tanggal_transaksi, username, asal, tujuan, harga from harga join tujuan on (harga.tujuan_id=tujuan.id)
       join asal on (harga.asal_id=asal.id) join transaksi on (destinasi_id=harga.id) join user on (user.id=transaksi.user_id) WHERE username = ':username'");

       $result = $this->db->resultSet();

       return $result;
    }
    
    public function tambahTopup($saldo, $username)
    {
        $this->db->query("UPDATE user SET saldo= '$saldo' WHERE username= '$username'");

        $this->db->bind(':saldo', $saldo);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editProfil($data, $username)
    {
        $this->db->query("UPDATE user SET nama = :nama, email = :email WHERE username = '$username'");

        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':email', $data['email']);

        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
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

    public function cariTiket($data)
    {
        $this->db->query('SELECT harga.id, asal, tujuan, harga from harga join tujuan on (harga.tujuan_id=tujuan.id) join asal on (harga.asal_id=asal.id) WHERE asal_id = :asal_id && tujuan_id = :tujuan_id');

        $this->db->bind(':asal_id', $data['asal_id']);
        $this->db->bind(':tujuan_id', $data['tujuan_id']);

        $result = $this->db->resultSet();

        return $result;
    }
}