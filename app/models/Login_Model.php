<?php
cekLogin('app');
class Login_model{
    // public $perusahaan = "CF";

    public function __construct()
    {
        $this->db = new Database();
    }

    public function signIn($data){

        if ($this->cekUsername($data) > 0) {
                $data['user'] = $this->getUser($data);
                if ($this->cekPassword($data) == true) {
                        $this->setSession($data);
                        return true;
                }else {
                        return false;
                }
            }else {
                return false;
            }
    }

    public function cekUsername($data){
        $username = htmlspecialchars($data['username']);
        $query = "SELECT * FROM user WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cekPassword($data){
        return hash('crc32c', $data['password']) == $data['user']['password'] ? true : false;
    }

    public function getUser($data)
    {
        $username = htmlspecialchars($data['username']);
        $query = "SELECT * FROM user WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function setSession($data){
        $data['user'] = $this->getUser($data);
        $_SESSION['admin'] = $data['user']['nama'];
        $_SESSION['username_admin'] = $data['user']['username'];
        $_SESSION['ci_idAdmin']       = $data['user']['id'];
    }
}