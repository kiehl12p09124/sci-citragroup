<?php


class Login extends Controller 
{
    public function index(){
        cekLogin();
        $data['script'] = 'login/index';
        $data['title']  = 'Log In';
        $this->view('login/index', $data);
    }

    public function signIn(){
        if ($this->model('Login_Model')->signIn($_POST)>0) {
            header('Location: '.BASEURL.'/CII');
        }
        else{
            Flasher::setFlash('Username/Password', 'Salah!', '', 'danger');
            header('Location: '.BASEURL.'/Login');
        }    
    }

    public function signOut(){
        session_destroy();
        unset($_SESSION);
        header('Location: '.BASEURL.'/Login');
    }
}
