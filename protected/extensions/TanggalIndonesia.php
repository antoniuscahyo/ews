<?php 
	/**
	* written by : Suryo Prasetyo W <the.oyrus@gmail.com>
	* description : Extension untuk menggenerate Tanggal Lokal Indonesia
	* 
	*/
	class TanggalIndonesia extends CApplicationComponent
	{
		public function TanggalUmum($tgl)
		{
			$tanggal = date('d',strtotime($tgl));
			$bulan = $this->getBulan(date('n',strtotime($tgl)));
			$tahun = date('Y',strtotime($tgl));
			$tanggalumum = $tanggal ." ".$bulan." ".$tahun;
			return $tanggalumum;
		}

		public function getBulan($kodebulan)
		{
			// date('n',strtotime('17-09-2014')) hasilnya 9
			// menggunakan format 'm' akan menghasilkan nomor bulan dengan 0
			// menggunakan format 'n' akan menghasilkan nomor bulan tanpa 0
			// dalam class ini gunakan 'n'
			switch ($kodebulan) {
				case 1:
					$namabulan = 'Januari';
					break;
				case 2:
					$namabulan = 'Februari';
					break;
				case 3:
					$namabulan = 'Maret';
					break;
				case 4:
					$namabulan = 'April';
					break;
				case 5:
					$namabulan = 'Mei';
					break;
				case 6:
					$namabulan = 'Juni';
					break;
				case 7:
					$namabulan = 'Juli';
					break;
				case 8:
					$namabulan = 'Agustus';
					break;
				case 9:
					$namabulan = 'September';
					break;
				case 10:
					$namabulan = 'Oktober';
					break;
				case 11:
					$namabulan = 'November';
					break;
				case 12:
					$namabulan = 'Desember';
					break;
				
				default:
					$namabulan = 'salah';
					break;
			}
			return $namabulan;
		}
	}