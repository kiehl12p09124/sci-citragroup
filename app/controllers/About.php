<?php


class About extends Controller{

    public function index($nama = "Orta", $umur = "18 Tahun", $hobi = "Membaca")
    {
        $data['nama'] = $nama;
        $data['umur'] = $umur;
        $data['hobi'] = $hobi;
        $data['title'] = "About";
        $this->view('about/index', $data);
    }


    public function page()
    {
        $data['title'] = "About";
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }

}