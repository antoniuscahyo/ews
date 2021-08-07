<?php 
	/**
	* Suryo Prasetyo W <the.oyrus@gmail.com>
	* Extension untuk mereplace template RTF
	*/
	class CetakRTF extends CApplicationComponent
	{
		public $handle;
		public $content;
		public $arraydatabaru;
		public $filenya;

		public function init()
		{
			parent::init();
			$dir = dirname(__FILE__);
	        $alias = md5($dir);
	        Yii::setPathOfAlias($alias,$dir);
	        //Yii::import('ext.CetakRTF.CImageHex');
		}

		public function loadFileRTF($pathfile)
		{
			$this->filenya = $pathfile;
			if ( file_exists($pathfile) ) {
				$this->handle = fopen ($this->filenya, 'r');
				$this->content = fread($this->handle, filesize($this->filenya));
				//echo "loaded";
			} else
				echo "not found";
		}

		public function setData(array $arraydatanya)
		{
			/*$arraydatanya = array
			(
			 '$tbldaftarrencanasurvey_nomorizin' => ,
			 '$tbldaftarrencanasurvey_tglizin' => $img->getContent(),
			 '$tbldaftarrencanasurvey_pemilikizin' => $account->date,
			 '$tbldaftarrencanasurvey_lokasi' => $account->link
			);*/

			$this->arraydatabaru = $arraydatanya;
		}

		public function getData()
		{
			print_r($this->arraydatabaru);
		}

		public function mulaiGanti()
		{
			// mulai ganti setiap datanya
			foreach($this->arraydatabaru as $from => $to) {
				if (substr($to, 0,4) =='img-') {
					Yii::import('ext.CetakRTF.CImageHex');
					$namaimg = '/'.substr($to, 5,strlen($to));
					$gambar = new CImageHex($namaimg,100,100);
					$to = $gambar->getContent();
				}
				$this->content = str_replace($from, $to, $this->content);
			   //echo "replaced ".$from." to ".$to;
			}

			//echo $this->content;
		}

		public function simpanFile($namabaru)
		{
			file_put_contents($this->filenya, $this->content);
			fclose($this->handle);

		}

		public function getFile($namanya)
		{
			return Yii::app()->getRequest()->sendFile($namanya, $this->content,'application/rtf');
			Yii::app()->end();
			/*header('Pragma: public');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header("Content-type: application/rtf");
                header("Content-Disposition: attachment; filename=\"$namanya\"");
                header('Content-Transfer-Encoding: binary');
                    echo $this->content;*/
		}
	}