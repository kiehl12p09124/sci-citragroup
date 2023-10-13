<?php


    class Memo_Model
    {   


        public function __construct()
        {
            $this->db = new Database();
        }

        public function getMemo()
        {
            $query = "SELECT * FROM memo ORDER BY tanggal DESC LIMIT 50";
            $this->db->query($query);
            return $this->db->resultSet();
        }


        public function getMemoRentang($data)
        {
            $rentang1 = $data['rentang1'];
            $rentang2 = $data['rentang2'];

            $query = "SELECT * FROM memo WHERE tanggal BETWEEN :rentang1 AND :rentang2 ORDER BY tanggal DESC LIMIT 50";
            $this->db->query($query);
            $this->db->bind('rentang1', $rentang1);
            $this->db->bind('rentang2', $rentang2);
            return $this->db->resultSet();
        }



        public function getMemoById($id)
        {   
            $id = htmlspecialchars($id);
            $query = "SELECT * FROM memo WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);
            return $this->db->single();
        }

        public function getBarangByIdMemo($id)
        {
            $query = "SELECT * FROM barang_memo WHERE id_memo = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);
            return $this->db->resultSet();
        }

        public function addMemo($data)
        {
            if ($this->insertMemo($data)) {
                $data['id_memo'] = $this->db->lastInsertId();
                var_dump($data); 
                if ($this->insertBarang($data) > 0) {
                    return true;
                } else {
                    $this->deleteMemoById($data['id_memo']);
                    Flasher::setFlash('Barang',  'gagal', 'ditambah! (Tidak Ada Barang yang dimasukan)', 'danger');
                }
            } else {
                return false;
            }
        }


    public function insertMemo($data)
    {

        //prepare data memo 
        $perusahaan     = htmlspecialchars($data['company']);
        $tujuan         = htmlspecialchars($data['destination']);
        $alamat         = htmlspecialchars($data['address']);
        $jenis          = htmlspecialchars($data['type']);
        $tanggal        = htmlspecialchars($data['memo_date']);
        $nama_driver    = htmlspecialchars($data['drivers_name']);
        $no_driver      = htmlspecialchars($data['drivers_number']);
        $no_kendaraan   = htmlspecialchars($data['vehicles_number']);

        // tambah ke tabel memo
        $query = "INSERT INTO memo(perusahaan, tujuan, alamat, jenis, tanggal, nama_driver, no_driver, no_kendaraan)
                    VALUES (:perusahaan, :tujuan, :alamat, :jenis, :tanggal, :nama_driver, :no_driver, :no_kendaraan)";
        $this->db->query($query);
        $this->db->bind('perusahaan', $perusahaan);
        $this->db->bind('tujuan', $tujuan);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('jenis', $jenis);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('nama_driver', $nama_driver);
        $this->db->bind('no_driver', $no_driver);
        $this->db->bind('no_kendaraan', $no_kendaraan);
        $this->db->execute();
        return $this->db->lastInsertId();
    }

    public function insertBarang($data)
    {
        if (!isset($data['item_name'])) {
            return false;
            exit;
        }

        //prepare data Barang
        $nama       = $data['item_name'];
        $id_memo    = $data['id_memo'];
        $ket        = $data['item_info'];
        $ukuran     = $data['item_size'];
        $qty        = $data['item_quantity'];

        for ($i = 0; $i < count($nama); $i++) {
            $query = "INSERT INTO barang_memo(id_memo, nama_barang, keterangan, ukuran, qty) 
                        VALUES ( :id_memo, :nama, :ket, :ukuran, :qty)";

            $this->db->query($query);
            $this->db->bind('id_memo', $id_memo);
            $this->db->bind('nama', htmlspecialchars($nama[$i]));
            $this->db->bind('ket', htmlspecialchars($ket[$i]));
            $this->db->bind('qty', htmlspecialchars($qty[$i]));
            $this->db->bind('ukuran', htmlspecialchars($ukuran[$i]));
            $this->db->execute();
        }
        return $this->db->rowCount();
    }
        public function ubahMemo($data)
        {
            if ($this->updateMemo($data) > 0) {
                if ($this->updateBarang($data) > 0) {
                    return true;
                } else{return true;}
            } else {
                return false;
            }
        }


    public function updateMemo($data)
    {

        //prepare data memo 
        $id_memo        = htmlspecialchars($data['id_memo']);
        $perusahaan     = htmlspecialchars($data['company']);
        $tujuan         = htmlspecialchars($data['destination']);
        $alamat         = htmlspecialchars($data['address']);
        $jenis          = htmlspecialchars($data['type']);
        $tanggal        = htmlspecialchars($data['memo_date']);
        $nama_driver    = htmlspecialchars($data['drivers_name']);
        $no_driver      = htmlspecialchars($data['drivers_number']);
        $no_kendaraan   = htmlspecialchars($data['vehicles_number']);

        // tambah ke tabel memo
        $query = "UPDATE memo SET
                        perusahaan      = :perusahaan,
                        tujuan          = :tujuan,
                        alamat          = :alamat,
                        jenis           = :jenis,
                        tanggal         = :tanggal,
                        nama_driver     = :nama_driver,
                        no_driver       = :no_driver,
                        no_kendaraan    = :no_kendaraan 
                    WHERE id = :id_memo
                    ";
        $this->db->query($query);
        $this->db->bind('perusahaan', $perusahaan);
        $this->db->bind('id_memo', $id_memo);
        $this->db->bind('tujuan', $tujuan);
        $this->db->bind('alamat', $alamat);
        $this->db->bind('jenis', $jenis);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('nama_driver', $nama_driver);
        $this->db->bind('no_driver', $no_driver);
        $this->db->bind('no_kendaraan', $no_kendaraan);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateBarang($data)
    {
        if (!isset($data['item_name'])) {
            return false;
            exit;
        }

        //prepare data Barang
        $id_barang  = $data['item_id'];
        $nama       = $data['item_name'];
        $id_memo    = $data['id_memo'];
        $ket        = $data['item_info'];
        $ukuran     = $data['item_size'];
        $qty        = $data['item_quantity'];

        for ($i = 0; $i < count($nama); $i++) {
            $query = "UPDATE barang_memo SET 
                            id_memo     = :id_memo,
                            nama_barang = :nama,
                            keterangan  = :ket, 
                            ukuran      = :ukuran, 
                            qty         = :qty

                        WHERE id = :id_barang";

            $this->db->query($query);
            $this->db->bind('id_memo', $id_memo);
            $this->db->bind('nama', htmlspecialchars($nama[$i]));
            $this->db->bind('ket', htmlspecialchars($ket[$i]));
            $this->db->bind('qty', htmlspecialchars($qty[$i]));
            $this->db->bind('ukuran', htmlspecialchars($ukuran[$i]));
            $this->db->bind('id_barang', htmlspecialchars($id_barang[$i]));
            $this->db->execute();
        }
        return $this->db->rowCount();
    }


    public function getIdMemoByTujuan($tujuan)
    {
        $query = "SELECT id FROM memo WHERE tujuan = :tujuan ORDER BY id DESC LIMIT 1";
        $this->db->query($query);
        $this->db->bind('tujuan', $tujuan);
        return $this->db->single()['id'];
    }

    public function deleteMemoById($id)
    {
        $query = "DELETE FROM memo WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }


     
    }