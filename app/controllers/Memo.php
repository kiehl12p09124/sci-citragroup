<?php


cekNoLogin();
class Memo extends Controller{
    public $con = 'Memo';

    public function index()
    {
        $data['memo'] = $this->model('Memo_Model')->getMemo();
        $data['script'] = 'memo/index';
        if (isset($_POST['rentang1'])) $data['memo'] = $this->model('Memo_Model')->getMemoRentang($_POST);
        $data['title']  = 'Daftar Memo';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('memo/index', $data);
        $this->view('templates/footer', $data);
    }

    public function addMemo(){
        $data['title']  = "Tambah Memo";
        $data['script'] = 'memo/addMemo';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('memo/addMemo');
        $this->view('templates/footer' ,$data);
    }

    public function tambahMemo()
    {   
        if ($this->model('Memo_Model')->addMemo($_POST)) 
        {
            Flasher::setFlash('Memo', 'berhasil', 'ditambah', 'success');
        } else Flasher::setFlash('Memo', 'gagal', 'ditambah', 'danger');
         
        header('location: ' . BASEURL . '/' . $this->con . '/addMemo');        
    
    }


    public function detail($id)
    {
        // $data['perusahaan'] = $this->perusahaan;
        $data['title'] = 'Detail Data Memo';
        $data['memo'] = $this->model('Memo_Model')->getMemoById($id);
        $data['barang'] = $this->model('Memo_Model')->getBarangByIdMemo($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('Memo/detailMemo', $data);
        $this->view('templates/footer');
    }

    public function delete($id)
    {
        if ($this->model('Memo_Model')->deleteMemoById($id) > 0) {
            Flasher::setFlash('Memo', 'Berhasil', 'Dihapus!', 'success');
            header('Location: ' . BASEURL . '/Memo');
        } else {
            Flasher::setFlash('Memo', 'Gagal', 'Dihapus!', 'danger');
            header('Location: ' . BASEURL . '/Memo');
        }
    }
    
    public function edit($id)
    {
        $data['title'] = 'Edit Data Memo';
        $data['script'] = 'Memo/editMemo';
        $data['memo'] = $this->model('Memo_Model')->getMemoById($id);
        $data['barang'] = $this->model('Memo_Model')->getBarangByIdMemo($id);
        
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('Memo/editMemo', $data);
        $this->view('templates/footer', $data);
    }    
    
    public function ubahMemo($id)
    {   
        $_POST['id_memo'] = $id;
        if ($this->model('Memo_Model')->ubahMemo($_POST) > 0) {
            Flasher::setFlash('Memo', 'berhasil', 'diubah', 'success');
            header('location: ' . BASEURL . '/' . $this->con . '/detail/'.$id);
        } else header('location: ' . BASEURL . '/' . $this->con . '/detail/'.$id);
    }

    public function printMemo($id)
    {
        $data['Memo'] = $this->model('Memo_Model')->getMemoById($id);
        $data['barang'] = $this->model('Memo_Model')->getBarangByIdMemo($id);
        $this->view('memo/printMemo', $data);
    }
}