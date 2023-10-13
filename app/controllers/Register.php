<?php

cekLogin();
class Register extends Controller{
    
    public function index(){
        $data['script'] = 'register/index';
        $data['title']  = 'Register';

        $this->view('register/index', $data);
    }
    
    // public function test(){
    //     $data['script'] = '-';
    //     $data['title']  = 'Register';
    //     $this->model('Register_Model')->addUser();
    // }


    public function registrasi(){
        if ($this->model('Register_Model')->addUser($_POST)>0) {
            Flasher::setFlash('User','Berhasil', 'Ditambah!', 'success');
            header('Location: '.BASEURL.'/Register');
        }
        else{
            header('Location: '.BASEURL.'/Register');
        }    
    }

}
