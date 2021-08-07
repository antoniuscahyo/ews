<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $_role;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	/*public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}*/

	public function authenticate()
	{
		$username = strtolower($this->username);
		$user = Pengguna::model()->find('LOWER(tblpengguna_username)=? AND tblpengguna_status="T"', array($username));		

		if($user===null) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;

		} else if(!$user->check($this->password))
			$this->errorCode = self::ERROR_PASSWORD_INVALID;

		else{
   // successful login
			$this->_id = $user->tblpengguna_id;
			$this->username = $user->tblpengguna_username;
			//die($user->tblpengguna_nama);
			$this->_role = $user->tblrole_id;
			$this->setState('username', $user->tblpengguna_username); // overide username
			$this->setState('nama_pengguna', $user->tblpengguna_nama); //overide role_id
			$this->setState('email', $user->tblpengguna_email); //overide email
			$this->setState('notelp', $user->tblpengguna_notelp);
			$this->setState('foto', $user->tblpengguna_foto); //overide no telp
			$this->setState('role_id', $user->tblrole_id); //overide role_id
			// ambilblok sistem id
			/*$idbloksistem = Kendalibloksistem::model()->getBlokSistemId($user->tblrole_id);
			$this->setState('bloksistem_id', $idbloksistem); //overide bloksistem_id*/
			//echo $this->_role;die;
			$this->errorCode = self::ERROR_NONE;

			/*cara memanggilnya */
			/*
			Yii::app()->user->getId untuk mengetahui id user yang login
			Yii::app()->user->username untuk mengetahui username yang login
			Yii::app()->user->nama_pengguna untuk mengetahui nama pengguna yang login
			Yii::app()->user->email untuk mengetahui email yang login
			Yii::app()->user->email untuk mengetahui notelp yang login
			Yii::app()->user->role_id untuk mengetahui role_id (level) yang login
			Yii::app()->user->bloksistem_id untuk mengetahui bloksistem_id (bloksistem) yang login
			*/
		}
		return $this->errorCode == self::ERROR_NONE;
	}

	public function getId()
	{
		return $this->_id;
	}

}