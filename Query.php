<?php

require 'Connect.php';

class Query extends Connect{

	protected $sql;
	protected $result;

	public function SQLLogin($email, $password){
		// Nantinya akan saya gunakan pada proses login users.
		$this->sql = "SELECT * FROM users WHERE email = '".$email."' AND password = '".md5($password)."'";
		// Memanggil method getResult untuk mengeksekusi sintaks SQL.
		return $this->getResult();
	}

	public function SQLValidateEmail($email){
		// Nantinya saya akan gunakan untuk proses validasi email pada proses register
		$this->sql = "SELECT * FROM users WHERE email = '".$email."'";
		// Memanggil method getResult untuk mengeksekusi sintaks SQL.
		return $this->getResult();
	}

	public function SQLRegister($name, $email, $password){
		// Nantinya saya akan gunakan untuk proses register user
		$this->sql = "INSERT INTO users(name, email, password, created_at)"."VALUES ('".$name."', '".$email."', '".md5($password)."', NOW())";
		// Memanggil method getResult untuk mengeksekusi sintaks SQL.
		return $this->getResult();
	}

	public function getResult(){
		// Setelah method SQL diatas di panggil setelah itu method getResult akan dipanggil untuk mengeksekusi
		// sintaks SQL diatas.
		$this->result = $this->dbConn()->query($this->sql);
		return $this;
	}

	public function FetchArray(){
		// Method ini berfungsi untuk memasukan data yang berada pada database kedalam variable array.
		$row = $this->result->fetch_array();
		return $row;
	}
}