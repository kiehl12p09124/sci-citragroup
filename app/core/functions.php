<?php

function hitung_kelas_siswa($ta_masuk,$current_tingkat, $current_ta){
    $ta_masuk = explode('/', $ta_masuk)[0];
    $current_ta = explode('/', $current_ta)[0];
    return $current_tingkat - ($current_ta-$ta_masuk);
}

function jumlahbulan($month){
$bulan =   [ 0 => 'bulan',
            1 => 7,
            2 => 8,
            3 => 9,
            4 => 10,
            5 => 11,
            6 => 12,
            7 => 1,
            8 => 2,
            9 => 3,
            10 => 4,
            11 => 5,
            12 => 6];
            return $bulan[$month];
}

function bulanindo($month){
    $bulan = ['bulan', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    return $bulan[$month];
}

function tgl_indo($tanggal){
	$bulan_ini = date('m')-1;
	$hari	= [ 'Minggu',
				'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				"Jum'at",
				'Sabtu'];
	$bulan = [	'bulan',
				'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'];
	$pecahkan = explode('-', $tanggal); 
	return (string)$hari[date('w', strtotime($tanggal))]. ", ". $pecahkan[2]. " ". $bulan[(int)$pecahkan[1]]. " ". $pecahkan[0];
}

function format_rupiah($nomor){
	return 'Rp. '.number_format($nomor,0,'.','.');
}
function format_ribuan($nomor){
	return number_format($nomor,0,'.','.');
}

function bgStatus($bg){
	$background = [
    "WAITING" => "btn-primary",
    "ON PROCCESS" => "btn-warning",
    "DONE" => "btn-success",
	"CLOSED" => "btn-danger"];

	return $background[$bg];}

function iconStatus($status){
	$stat = [
	"WAITING" => '<i class="fas fa-clock"></i>',
    "ON PROCCESS" => '<i class="fas fa-truck"></i>',
    "DONE" => '<i class="fas fa-check"></i>',
	"CLOSED" => '<i class="fas fa-ban"></i>'
	];
	return $stat[$status];
}

function cekNoLogin(){
	if (!isset($_SESSION['ci_idAdmin'])) {
		// Flasher::setFlash('Lakukan', 'Login', 'terlebih dahulu!', 'danger');
		header('Location: '.BASEURL.'/login');
	}
}

function cekLogin(){
	if (isset($_SESSION['ci_idAadmin'])) header('Location: '.BASEURL.'/CII');
}

function romawi($angka){
	$romawi = ["romawi",
				"I", 
				"II",
				"III", 
				"IV", 
				"V", 
				"VI", 
				"VII", 
				"VIII", 
				"IX", 
				"X", 
				"XI", 
				"XII"];
	return $romawi[(int)$angka];
}

	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}

	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil." Rupiah";
	}

	function citra($string){
		$citra = [
			"CII" => "Citra Interior Indonesia",
			"CF"  => "Citra Furniture Indonesia",
			"SCI" => "Sentral Citra Indonesia"
		];
		return $citra[$string];
	}

	function rekening($perusahaan){
		$rekening =  [
					[	'rekening' => "7035622888",
						'an'	   => "William Prayogo",
						'bank'     => "BCA" 	],

					[	'rekening' => "5222227071",
						'an'	   => "PT. Sentral Citra Indonesia",
						'bank'     => "BCA" 	],
						
					[	'rekening' => "7035105557",
						'an'	   => "CV. Mulia Utama Indonesia",
						'bank'     => "BCA" 	],
						
						
					[	'rekening' => "7035105549",
						'an'	   => "Lauren Valentina",
						'bank'     => "BCA" 	]
		];

		switch ($perusahaan) {
			case 'CII':
				$rek = [$rekening[0], $rekening[1]];
				break;
			
			case 'CF':
				$rek = [$rekening[0], $rekening[1], $rekening[2]];
				break;
				
			case 'SCI':
				$rek = [$rekening[1], $rekening[2]];
				break;

			default:
				$rek = $rekening;
		}
		return $rek;
	}