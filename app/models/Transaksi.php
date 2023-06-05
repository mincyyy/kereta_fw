<?php 

class Transaksi
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function search($search)
    {
        $this->db->query("SELECT * FROM transaksi WHERE username LIKE '%$search%' or asal like '%$search%' or tujuan like '%$search%' or tanggal_transaksi like '%$search%' order by tanggal_transaksi");

        $this->db->bind(':search', $search);

        $result = $this->db->resultSet();

        return $result;
    }

    public function showTransaksiAdmin()
    {
        $this->db->query('SELECT tanggal_transaksi, username, asal, tujuan, harga from harga join tujuan on (harga.tujuan_id=tujuan.id)
        join asal on (harga.asal_id=asal.id) join transaksi on (destinasi_id=harga.id) join user on (user.id=transaksi.user_id)  order by transaksi.id');

        $result = $this->db->resultSet();

        return $result;
    }

}