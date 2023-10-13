<?php 
    cekNoLogin();
    class CII extends Controller{
        public $perusahaan = "CII";
        public function index()
        {   
            $data['perusahaan'] = $this->perusahaan;
            $data['status'] = $this->model('CII_Model')->getJumlahSuratThisMonth();
            $data['script'] = 'cii/index';
            $data['surat'] = $this->model('CII_Model')->getSuratThisMonth();
            $data['title']  = 'Dashboard '.$this->perusahaan;
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('cii/index', $data);
            $this->view('templates/footer', $data);
        }

        public function addSurat()
        {   
            $data['perusahaan'] = $this->perusahaan;
            $data['available_seri'] = $this->model('CII_Model')->getAvailableSeri();
            $data['script'] = "cii/addSurat";
            $data['title']  = "Tambah Surat CII";
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('cii/addSurat', $data);
            $this->view('templates/footer', $data);            
        }

        public function tambahSurat()
        {    
            $data['perusahaan'] = $this->perusahaan;
            if($this->model('CII_Model')->addSurat($_POST) > 0){
                Flasher::setFlash('Surat', 'berhasil', 'ditambah', 'success');
                header('location: '.BASEURL.'/'.$this->perusahaan.'/addSurat');
            }
            else header('location: '.BASEURL.'/'.$this->perusahaan.'/addSurat');
        }

        public function detail($id)
        {
            $data['perusahaan'] = $this->perusahaan;
            $data['title'] = 'Detail Data Surat '.$this->perusahaan;
            $data['surat'] = $this->model('CII_Model')->getSuratById($id);
            $data['interior'] = $this->model('CII_Model')->getInteriorByIdSurat($id);
                    
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('cii/detailSurat', $data);
            $this->view('templates/footer');
        }

        public function hapusSurat($id)
        {
            $data['perusahaan'] = $this->perusahaan;
            if($this->model('CII_Model')->hapusSuratById($id) > 0 ){
                Flasher::setFlash('Surat', 'Berhasil', 'Dihapus!','success');
                header('Location: '.BASEURL.'/'.$this->perusahaan);
            }
            else{
                Flasher::setFlash('Surat', 'Gagal','Dihapus!','danger' );
                header('Location: '.BASEURL.'/'.$this->perusahaan);
            }
        }

        public function edit($id)
        {
            cekNoLogin();
            $data['perusahaan'] = $this->perusahaan;
            $data['title'] = 'Edit Data Surat';
            $data['script'] = 'cii/editSurat';
            $data['surat'] = $this->model('CII_Model')->getSuratById($id);
            $data['interior'] = $this->model('CII_Model')->getInteriorByIdSurat($id);
                    
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('cii/editSurat', $data);
            $this->view('templates/footer', $data);
        }    
    
        public function editSurat($id)
        {       
            $data['perusahaan'] = $this->perusahaan;
            if($this->model('CII_Model')->editSurat($_POST, $id) > 0)
            {
                Flasher::setFlash('Surat', 'berhasil', 'diubah', 'success');
                header('location: '.BASEURL.'/'.$this->perusahaan.'/detail/'.$id);
            }
            else 
            {
                Flasher::setFlash('Surat', 'gagal', 'diubah', 'danger');
                header('location: '.BASEURL.'/'.$this->perusahaan.'/detail/'.$id);
            }
        }
        
        
        public function print($id)
        {
            $data['perusahaan'] = $this->perusahaan;
            $data['surat'] = $this->model('CII_Model')->getSuratById($id);
            $data['interior'] = $this->model('CII_Model')->getInteriorByIdSurat($id);
            $this->view('cii/print', $data);
        }

        public function Surat()
        {   
            $data['perusahaan'] = $this->perusahaan;
            $data['surat'] = $this->model('CII_Model')->getMuchSurat();
            $data['script'] = 'cii/index';
            if(isset($_POST['rentang1'])) $data['surat'] = $this->model('CII_Model')->getSuratRentang($_POST);
            $data['title']  = 'Dashboard '.$this->perusahaan;
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('cii/surat', $data);
            $this->view('templates/footer', $data);
        }
        public function deleted()
        {   
            $data['perusahaan'] = $this->perusahaan;
            $data['surat'] = $this->model('CII_Model')->getSuratDeleted();
            $data['script'] = 'cii/index';
            $data['title']  = 'Restore '.$this->perusahaan;
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('cii/deleted', $data);
            $this->view('templates/footer', $data);
        }

        public function restore($id){
            if ($this->model('CII_model')->restoreSuratById($id)>0) {
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
            $data['surat']      = $this->model('CII_Model')->getSuratById($id);
            $data['interior']   = $this->model('CII_Model')->getInteriorByIdSurat($id);
            $this->view('cii/invoice', $data);
        }

        public function ubahRek(){
            $this->model('CII_Model')->ubahRek();
        }
    }
    