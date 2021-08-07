<?php

/**
* Class Untuk Mengubah Bulan ke Format Romawi
* harry.andriyan@gmail.com
*/
class BulanRomawi extends CApplicationComponent
{
	
	public function Ubah($bulan)
	{
		switch ($bulan) {
			case 1:
				$bulanromawi = "I";
				break;
			case 2:
				$bulanromawi = "II";
				break;
			case 3:
				$bulanromawi = "III";
				break;
			case 4:
				$bulanromawi = "IV";
				break;
			case 5:
				$bulanromawi = "V";
				break;
			case 6:
				$bulanromawi = "VI";
				break;
			case 7:
				$bulanromawi = "VII";
				break;
			case 8:
				$bulanromawi = "VIII";
				break;
			case 9:
				$bulanromawi = "IX";
				break;
			case 10:
				$bulanromawi = "X";
				break;
			case 11:
				$bulanromawi = "XI";
				break;
			case 12:
				$bulanromawi = "XII";
				break;
			
			default:
				$bulanromawi = "I";
				break;
		}

		return $bulanromawi;
	}
}

?>