<?php


    class Surat extends Controller{
        public function index(){
            $data['script'] = 'surat/index';
            $this->view('templates/header');
            $this->view('templates/sidebar');
            $this->view('surat/index');
            $this->view('templates/footer', $data);
        }


        public function new(){
            $data['script'] = 'surat/new';
            $this->view('templates/header');
            $this->view('templates/sidebar');
            $this->view('surat/new');
            $this->view('templates/footer', $data);
        }
    }