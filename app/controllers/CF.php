
<?php 
     cekNoLogin();
    class CF extends Controller{
        public $perusahaan = "CF";

        public function index()
        {   
            $data['perusahaan'] = $this->perusahaan;
            $data['status'] = $this->model('CF_Model')->getJumlahSuratThisMonth();
            $data['script'] = 'cf/index';
            $data['surat'] = $this->model('CF_Model')->getSuratThisMonth();
            $data['title']  = 'Dashboard '.$this->perusahaan;
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('cf/index', $data);
            $this->view('templates/footer', $data);
        }

        public function addSurat()
        {   
            $data['perusahaan'] = $this->perusahaan;
            $data['available_seri'] = $this->model('CF_Model')->getAvailableSeri();
            $data['script'] = "cf/addSurat";
            $data['title']  = "Tambah Surat CF";
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('cf/addSurat', $data);
            $this->view('templates/footer', $data);            
        }

        public function tambahSurat()
        {   
            $data['perusahaan'] = $this->perusahaan;
            if($this->model('CF_Model')->addSurat($_POST) > 0){
                Flasher::setFlash('Surat', 'berhasil', 'ditambah', 'success');
                header('location: '.BASEURL.'/'.$this->perusahaan.'/addSurat');
            }
            else header('location: '.BASEURL.'/'.$this->perusahaan.'/addSurat');
        }

        public function detail($id){
            $data['perusahaan'] = $this->perusahaan;
            $data['title'] = 'Detail Data Surat '.$this->perusahaan;;
            $data['surat'] = $this->model('CF_Model')->getSuratById($id);
            $data['barang'] = $this->model('CF_Model')->getBarangByIdSurat($id);
                    
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('cf/detailSurat', $data);
            $this->view('templates/footer');
        }

        public function hapusSurat($id){
            $data['perusahaan'] = $this->perusahaan;
            if($this->model('CF_Model')->hapusSuratById($id) > 0){
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
            $data['script'] = 'cf/editSurat';
            $data['surat'] = $this->model('CF_Model')->getSuratById($id);
            $data['barang'] = $this->model('CF_Model')->getBarangByIdSurat($id);
                    
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('cf/editSurat', $data);
            $this->view('templates/footer', $data);
        }    
    
        public function editSurat($id)
        {   
            $data['perusahaan'] = $this->perusahaan;
            if($this->model('CF_Model')->editSurat($_POST, $id) > 0){
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
            $data['surat']      = $this->model('CF_Model')->getSuratById($id);
            $data['barang']   = $this->model('CF_Model')->getBarangByIdSurat($id);
            $this->view('cf/print', $data);
        }        
        
        public function surat()
        {   
            $data['perusahaan'] = $this->perusahaan;
            $data['surat'] = $this->model('CF_Model')->getMuchSurat();
            $data['script'] = 'cf/index';
            if(isset($_POST['rentang1'])) $data['surat'] = $this->model('CF_Model')->getSuratRentang($_POST);
            $data['title']  = 'Dashboard '.$this->perusahaan;
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('cf/surat', $data);
            $this->view('templates/footer', $data);
        }

        public function deleted()
        {   
            $data['perusahaan'] = $this->perusahaan;
            $data['surat'] = $this->model('CF_Model')->getSuratDeleted();
            $data['script'] = 'cf/index';
            $data['title']  = 'Restore '.$this->perusahaan;
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('cf/deleted', $data);
            $this->view('templates/footer', $data);
        }

        public function restore($id){
            if ($this->model('CF_model')->restoreSuratById($id)>0) {
                Flasher::setFlash('Surat', 'berhasil', 'di-restore!', 'success');
                header('location: '.BASEURL.'/'.$this->perusahaan.'/deleted');
            }else{
                Flasher::setFlash('Surat', 'gagal', 'di-restore!', 'danger');
                header('location: '.BASEURL.'/'.$this->perusahaan.'/deleted');
            }
        }


        public function invoicePrint($id)
        {
            $data['perusahaan'] = $this->perusahaan;
            $data['surat']      = $this->model('CF_Model')->getSuratById($id);
            $data['barang']   = $this->model('CF_Model')->getBarangByIdSurat($id);
            $this->view('cf/invoice', $data);
        }



    //Komplain
        // public function Komplain(){
        //     $data['title']  = 'Komplain '.$this->perusahaan;
        //     $this->view('cf/Komplain');
        //     $this->view('cf/newKomplain');
        // }

    // public function Komplain($id = "-")
    // {
    //     $data['perusahaan'] = $this->perusahaan;
    //     $data['surat']      = $this->model('CF_Model')->getSuratById($id);
    //     $data['barang']   = $this->model('CF_Model')->getBarangByIdSurat($id);
    //     $this->view('cf/printKomplain', $data);
    // }  
    }
    