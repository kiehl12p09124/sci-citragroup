
<?php 
    cekNoLogin();
    class SCI extends Controller{
        public $perusahaan = "SCI";

        public function index()
        {   
            $data['perusahaan'] = $this->perusahaan;
            $data['status'] = $this->model('SCI_Model')->getJumlahSuratThisMonth();
            $data['script'] = 'sci/index';
            $data['surat'] = $this->model('SCI_Model')->getSuratThisMonth();
            $data['title']  = 'Dashboard '.$this->perusahaan;
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('sci/index', $data);
            $this->view('templates/footer', $data);
        }

        public function addSurat()
        {   
            $data['perusahaan'] = $this->perusahaan;
            $data['available_seri'] = $this->model('SCI_Model')->getAvailableSeri();
            $data['script'] = "sci/addSurat";
            $data['title']  = "Tambah Surat SCI";
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('sci/addSurat', $data);
            $this->view('templates/footer', $data);            
        }

        public function tambahSurat()
        {   
            $data['perusahaan'] = $this->perusahaan; 
            if($this->model('SCI_Model')->addSurat($_POST) > 0){
                Flasher::setFlash('Surat', 'berhasil', 'ditambah', 'success');
                header('location: '.BASEURL.'/'.$this->perusahaan.'/addSurat');
                }
            else header('location: '.BASEURL.'/'.$this->perusahaan.'/addSurat');
        }

        public function detail($id){
            $data['perusahaan'] = $this->perusahaan;
            $data['title'] = 'Detail Data Surat '.$this->perusahaan;
            $data['surat'] = $this->model('SCI_Model')->getSuratById($id);
            $data['barang'] = $this->model('SCI_Model')->getBarangByIdSurat($id);
                    
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('sci/detailSurat', $data);
            $this->view('templates/footer');
        }

        public function hapusSurat($id){
            $data['perusahaan'] = $this->perusahaan;
            if($this->model('SCI_Model')->hapusSuratById($id) > 0){
                Flasher::setFlash('Surat', 'Berhasil', 'Dihapus!','success');
                header('Location: '.BASEURL.'/'.$this->perusahaan);
            }
            else{
                Flasher::setFlash('Surat', 'Gagal','Dihapus!','danger' );
                header('Location: '.BASEURL.'/'.$this->perusahaan);
            }
        }
            public function edit($id){
                $data['perusahaan'] = $this->perusahaan;
            $data['title'] = 'Edit Data Surat';
            $data['script'] = 'sci/editSurat';
            $data['surat'] = $this->model('SCI_Model')->getSuratById($id);
            $data['barang'] = $this->model('SCI_Model')->getBarangByIdSurat($id);
                    
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('sci/editSurat', $data);
            $this->view('templates/footer', $data);
        }    
    
        public function editSurat($id)
        {   
            $data['perusahaan'] = $this->perusahaan; 
            if($this->model('SCI_Model')->editSurat($_POST, $id) > 0){
                Flasher::setFlash('Surat', 'berhasil', 'diubah', 'success');
                header('location: '.BASEURL.'/'.$this->perusahaan.'/detail/'.$id);
            }
            else {
            Flasher::setFlash('Surat', 'gagal', 'diubah', 'danger');
            header('location: '.BASEURL.'/'.$this->perusahaan.'/detail/'.$id);
            // var_dump($_POST);
            }
        // var_dump($_POST);
        }
        
        public function print($id)
        {
            $data['perusahaan'] = $this->perusahaan;
            $data['surat']      = $this->model('SCI_Model')->getSuratById($id);
            $data['barang']   = $this->model('SCI_Model')->getBarangByIdSurat($id);
            $this->view('sci/print', $data);
        }
        
        public function surat()
        {   
            $data['perusahaan'] = $this->perusahaan;
            $data['surat'] = $this->model('SCI_Model')->getMuchSurat();
            $data['script'] = 'sci/index';
            if(isset($_POST['rentang1'])) $data['surat'] = $this->model('SCI_Model')->getSuratRentang($_POST);
            $data['title']  = 'Dashboard '.$this->perusahaan;
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('sci/surat', $data);
            $this->view('templates/footer', $data);
        }

        
        public function deleted()
        {   
            $data['perusahaan'] = $this->perusahaan;
            $data['surat'] = $this->model('SCI_Model')->getSuratDeleted();
            $data['script'] = 'SCI/index';
            $data['title']  = 'Restore '.$this->perusahaan;
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('SCI/deleted', $data);
            $this->view('templates/footer', $data);
        }

        public function restore($id){
            if ($this->model('SCI_model')->restoreSuratById($id)>0) {
                Flasher::setFlash('Surat', 'berhasil', 'di-restore!', 'success');
                header('location: '.BASEURL.'/'.$this->perusahaan.'/deleted');
            }else{
                Flasher::setFlash('Surat', 'gagal', 'di-restore!', 'danger');
                header('location: '.BASEURL.'/'.$this->perusahaan.'/deleted');
            }
        }


    //Invoice

        public function invoicePrint($id)
        {
            $data['perusahaan'] = $this->perusahaan;
            $data['surat']      = $this->model('SCI_Model')->getSuratById($id);
            $data['barang']   = $this->model('SCI_Model')->getBarangByIdSurat($id);
            $this->view('sci/invoice', $data);
        }

        public function memo($id)
        {
            $data['perusahaan'] = $this->perusahaan;
            $data['surat']      = $this->model('SCI_Model')->getSuratById($id);
            $data['barang']   = $this->model('SCI_Model')->getBarangByIdSurat($id);
            $this->view('sci/memo', $data);
        }

    //Surat Jalan
        public function suratJalan($id)
        {
            $data['perusahaan'] = $this->perusahaan;
            $data['surat']      = $this->model('SCI_Model')->getSuratById($id);
            $data['barang']   = $this->model('SCI_Model')->getBarangByIdSurat($id);
            $this->view('sci/suratJalan', $data);
        }





        }
        