<?php 

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function cariUsername($username)
    {
        $this->db->query('SELECT * FROM user WHERE username = :username');

        $this->db->bind(':username', $username);

        $row = $this->db->rowCount();

        if ($row > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function tambahUser($data)
    {
        $this->db->query('INSERT INTO user (username, password, nama, jenis_kelamin, tanggal_lahir, email, saldo, status) VALUES (:username, :password, :nama, :jenis_kelamin, :tanggal_lahir, :email, 0, "user")');
        
        $this->db->bind(':username',$data['username']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':nama',$data['nama']);
        $this->db->bind(':jenis_kelamin',$data['jenis_kelamin']);
        $this->db->bind(':tanggal_lahir',$data['tanggal_lahir']);
        $this->db->bind(':email',$data['email']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($password, $username)
    {
        $this->db->query('SELECT * FROM user WHERE username = :username');

        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hash_password = $row->password;

        if (password_verify($password, $hash_password)) {
            return $row;
        } else {
            return false;
        }
    }
}
