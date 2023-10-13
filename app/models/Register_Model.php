<?php

class Register_model{
    // public $perusahaan = "CF";

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addUser($data)
    {
        if ($this->cekToken($data) > 0){
                if($this->cekUsername($data) == 0){
                    if($this->insertUser($data) > 0){
                        $this->dropToken($data);
                        return true;
                    }else{
                        Flasher::setFlash('User', 'Gagal', 'Ditambah','danger');
                        return false;
                    }
                }else {
                    Flasher::setFlash('User', 'Gagal', 'Ditambah! (Username ini telah digunakan)','danger');
                    return false;
                }
        }else {
            Flasher::setFlash('User', 'Gagal', 'Ditambah! (Token yang digunakan salah)','danger');
            return false;
        }
    }
    
    // public function test(){

    // return !is_array($this->cekToken('wnuJYVsb'));
    // }
    public function cekToken($data)
    {
        $token = htmlspecialchars($data['token']);
        $query = "SELECT * FROM token WHERE token = :token";
        $this->db->query($query);
        $this->db->bind('token', $token);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cekUsername($data){

        $username = htmlspecialchars($data['username']);
        $query = "SELECT * FROM user WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username',$username);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function insertUser($data){

        $username = htmlspecialchars($data['username']);
        $nama = htmlspecialchars($data['nama']);
        $password = hash('crc32c', $data['password']);
        $query = "INSERT INTO user VALUES('',:nama, :username, :password, :role)";
        $this->db->query($query);
        $this->db->bind('nama', $nama);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->bind('role', 'Admin');
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function dropToken($data){
        $token = htmlspecialchars($data['token']);
        $query = "DELETE FROM token WHERE token = :token";
        $this->db->query($query);
        $this->db->bind('token', $token);
        $this->db->execute();
        return $this->db->rowCount();
    }
}