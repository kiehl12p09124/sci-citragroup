<?php


class CII_model{
    public $perusahaan = "CII";

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getSuratThisMonth(){
        $query = "SELECT * FROM surat WHERE perusahaan = :perusahaan AND data = 'aktif' ORDER BY tgl_surat DESC";
        $this->db->query($query);
        $this->db->bind('perusahaan', $this->perusahaan);
        return $this->db->resultSet();
    }
    
    public function getSuratRentang($data)
    {   
        $rentang1 = $data['rentang1'];
        $rentang2 = $data['rentang2'];
        
        $query = "SELECT * FROM surat WHERE perusahaan = :perusahaan AND data = 'aktif' && (tgl_surat BETWEEN :rentang1 AND :rentang2) ORDER BY tgl_surat";
        $this->db->query($query);
        $this->db->bind('perusahaan', $this->perusahaan);
        $this->db->bind('rentang1', $rentang1);
        $this->db->bind('rentang2', $rentang2);
        return $this->db->resultSet();
    }


    public function getMuchSurat()
    {   
        $rentang1 = date('Y-m-d', strtotime("-6 month"));
        $rentang2 = date('Y-m-d', strtotime("+6 month"));
        


        $query = "SELECT * FROM surat WHERE perusahaan = :perusahaan AND data = 'aktif' && (tgl_surat BETWEEN :rentang1 AND :rentang2) ORDER BY tgl_surat";
        $this->db->query($query);
        $this->db->bind('perusahaan', $this->perusahaan);
        $this->db->bind('rentang1', $rentang1);
        $this->db->bind('rentang2', $rentang2);
        return $this->db->resultSet();
    }

    public function getJumlahSuratThisMonth(){
        $query = "SELECT 
                        SUM(CASE WHEN surat.status='PENDING' THEN 1 ELSE 0 END) AS pending,
                        SUM(CASE WHEN surat.status='ON PROCCESS' THEN 1 ELSE 0 END) AS on_proccess,
                        SUM(CASE WHEN surat.status='DONE' THEN 1 ELSE 0 END) AS done,
                        SUM(CASE WHEN surat.status='CLOSED' THEN 1 ELSE 0 END) AS closed
                    
                    FROM surat WHERE perusahaan = :perusahaan AND data = 'aktif' AND (YEAR(tgl_surat) = :tahun AND MONTH(tgl_surat) = :bulan)";
        $this->db->query($query);
        $this->db->bind('perusahaan', $this->perusahaan);
        $this->db->bind('bulan', (string)date('m'));
        $this->db->bind('tahun', (string)date('Y'));
        return $this->db->single();
    }    



    public function getAvailableSeri()
    {   
        $month = date('m');
        $year = date('Y');
        $query = "SELECT no_seri AS no FROM surat WHERE perusahaan = :perusahaan AND YEAR(tgl_surat) = :tahun AND month(tgl_surat) = :bulan ORDER BY id DESC LIMIT 1";
        $this->db->query($query);
        $this->db->bind('perusahaan', $this->perusahaan);
        $this->db->bind('tahun', $year);
        $this->db->bind('bulan', $month);
        $result = $this->db->single();
        
        $availableSeri = is_bool($result) ? 1 : (int)explode('/',$result['no'])[3]+1;
        
        return $availableSeri;
    }

    public function getIdSuratWithSeri($seri)
    {
        $query = "SELECT id FROM surat WHERE perusahaan = :perusahaan AND no_seri = :no_seri";
        $this->db->query($query);
        $this->db->bind('no_seri', $seri);
        $this->db->bind('perusahaan', $this->perusahaan);
        $this->db->execute();

        return $this->db->single()['id'];
    }

    public function addSurat($data)
    {
        if ($this->insertSurat($data) > 0) {
            $data['id_surat'] = $this->getIdSuratWithSeri($data['no_seri']);
                if ($this->insertInterior($data) > 0) {
                    return true;
                }
                else {
                    $this->dropWithSeri($data['no_seri']);
                    Flasher::setFlash('Interior',  'gagal', 'ditambah! (Tidak Ada barang Interior yang dimasukan)','danger');
                }
        }
        else{
            return false;
        }
    }

    public function insertSurat($data)
    {

        //prepare data surat 
        $hal            = htmlspecialchars($data['hal']);
        $tujuan         = htmlspecialchars($data['tujuan']);
        $tanggal        = htmlspecialchars($data['tanggal']);
        $diskon         = str_replace('.', '', htmlspecialchars($data['diskon']));
        $no_seri        = htmlspecialchars($data['no_seri']);
        $tempo          = htmlspecialchars($data['tempo']);
        $ppn            = $data['ppn'];
        $transfer       = $data['rekening'];
        $catatan        = $data['catatan'];
        $status         = "WAITING";
        
        switch ($data['sepakat_pembayaran']) {
            case 'Kesepakatan':
                $kesepakatan    = "-";
                break;

            case 'Tempo':
                $kesepakatan    = $tempo;
                break;

            default:
                return false;
                break;
        }

        // tambah ke tabel surat
        $query = "INSERT INTO surat VALUES('', :no_seri, :tujuan, :hal, :tgl_surat, :perusahaan, :diskon, :tempo, :ppn, :rekening, :catatan, :statuss, 'aktif')";
        $this->db->query($query);
        $this->db->bind('no_seri', $no_seri);
        $this->db->bind('tujuan', $tujuan);
        $this->db->bind('hal', $hal);
        $this->db->bind('tgl_surat', $tanggal);
        $this->db->bind('perusahaan', $this->perusahaan);
        $this->db->bind('diskon',$diskon);
        $this->db->bind('tempo', $kesepakatan);
        $this->db->bind('ppn', $ppn);
        $this->db->bind('rekening', $transfer);
        $this->db->bind('catatan', $catatan);
        $this->db->bind('statuss', $status);
        $this->db->execute();

        return $this->db->rowCount();        
    }

    public function insertInterior($data)
    {
        // echo $data['id_surat'];
        // exit;
        if (!isset($data['nama_interior'])) {
            return false;
            exit;
        }

        //prepare data Interior
        $nama = $data['nama_interior'];
        $id_surat = $data['id_surat'];
        $volume1 = $data['volume1'];
        $volume2 = $data['volume2'];
        $harga = $data['harga_interior'];
        $no_seri = $data['no_seri'];

        for ($i=0; $i < count($nama); $i++) {    
            $query = "INSERT INTO interior 
                        VALUES ('', :id_surat, :nama, :no_seri, :volume1, :volume2, :harga)";
            
            $this->db->query($query);
            $this->db->bind('nama', htmlspecialchars($nama[$i]));
            $this->db->bind('id_surat', $id_surat);
            $this->db->bind('no_seri', htmlspecialchars($no_seri));
            $this->db->bind('volume1', str_replace(',', '.', htmlspecialchars($volume1[$i])));
            $this->db->bind('volume2', str_replace(',', '.', htmlspecialchars($volume2[$i])));
            $this->db->bind('harga', str_replace('.', '', htmlspecialchars($harga[$i])));
            $this->db->execute();
        }
        return $this->db->rowCount();
    }

    public function dropWithSeri($no_seri)
    {        
        $query = "DELETE FROM surat WHERE no_seri = :no_seri";

        $this->db->query($query);
        $this->db->bind('no_seri', htmlspecialchars($no_seri));
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getSuratById($id){
        $query = "SELECT * FROM surat WHERE id = :id AND perusahaan = :perusahaan";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('perusahaan', $this->perusahaan);
        return $this->db->single();
    }

    public function getInteriorByIdSurat($id){
        $query = "SELECT * FROM interior WHERE id_surat = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }



















    public function editSurat($data, $id){
        $data['id'] = $id;
        return $this->ubahSurat($data) > 0 ? true : false;
        // var_dump($data);
    }

    public function ubahSurat($data)
    {
        //prepare data surat 
        $hal            = htmlspecialchars($data['hal']);
        $tujuan         = htmlspecialchars($data['tujuan']);
        $tanggal        = htmlspecialchars($data['tanggal']);
        $diskon         = str_replace('.', '', htmlspecialchars($data['diskon']));
        $no_seri        = htmlspecialchars($data['no_seri']);
        $tempo          = htmlspecialchars($data['tempo']);
        $ppn            = $data['ppn'];
        $transfer       = $data['rekening'];
        $catatan        = htmlspecialchars($data['catatan']);
        $status         = $data['status'];
        // $data           = $data['data'];
        $id             = $data['id']; 
        
        switch ($data['sepakat_pembayaran']) {
            case 'Kesepakatan':
                $kesepakatan    = "-";
                break;

            case 'Tempo':
                $kesepakatan    = $tempo;
                break;

            default:
                return false;
                break;
        }

        // tambah ke tabel surat
        $query = "UPDATE surat SET 
                                tujuan      = :tujuan, 
                                hal         = :hal, 
                                tgl_surat   = :tgl_surat,
                                diskon      = :diskon,
                                tempo       = :tempo,
                                ppn         = :ppn, 
                                rekening    = :rekening, 
                                catatan     = :catatan, 
                                status      = :statuss 
                                    WHERE id = :id";
        $this->db->query($query);
        // $this->db->bind('no_seri', $no_seri);
        $this->db->bind('tujuan', $tujuan);
        $this->db->bind('hal', $hal);
        $this->db->bind('tgl_surat', $tanggal);
        $this->db->bind('id', $id);
        $this->db->bind('diskon', $diskon);
        $this->db->bind('tempo', $kesepakatan);
        $this->db->bind('ppn', $ppn);
        $this->db->bind('rekening', $transfer);
        $this->db->bind('catatan', $catatan);
        $this->db->bind('statuss', $status);

        $this->db->execute();

        return $this->db->rowCount();        
    }

    public function hapusSuratById($id){
        $query = "UPDATE surat SET data = '!aktif' WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();           
    }
    
    public function getSuratDeleted(){
        $query = "SELECT * FROM surat WHERE perusahaan = :perusahaan AND data = :dataa";
        $this->db->query($query);
        $this->db->bind('perusahaan', $this->perusahaan);
        $this->db->bind('dataa', '!aktif');
        return $this->db->resultSet();
    }
    
    public function restoreSuratById($id){
        $query = "UPDATE surat SET data = 'aktif' WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();           
    }



    public function getAllRek(){
        $query = "SELECT rekening, id FROM surat";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function ubahRek(){

        foreach ($this->getAllRek() as $rek) {
            $rekening   = explode('-', $rek['rekening'])[1].'-'.explode('-', $rek['rekening'])[0]. '-'. explode('-', $rek['rekening'])[2];   
            
            $query = "UPDATE surat SET rekening = :rekening WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('rekening',$rekening);
            $this->db->bind('id',$rek['id']);
            $this->db->execute();
        }
    }

}