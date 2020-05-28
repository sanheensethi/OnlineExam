<?php

class myDataBase {
	
	var $host;
	var $username;
	var $password;
	var $database;
	var $connect;
	var $query;
	var $data;
	var $statement;
	var $date;
	var $time;
	
	function __construct()
	{
		$this->host = 'localhost';
		$this->username = 'root';
		$this->password = '';
		$this->database = 'onlineexam';
		//$this->home_page = 'http://localhost/tutorial/online_examination/';
	
		$this->connect = new PDO("mysql:host=$this->host; dbname=$this->database", "$this->username", "$this->password");
		$this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//session_start();
		
		date_default_timezone_set('Asia/Kolkata');
		$this->date=date("Y-m-d");
		$this->time=date("H:i:s");
		
	}
	
	public function execute_query()
	{
		try{
			$this->statement = $this->connect->prepare($this->query);
			$this->statement->execute($this->data);
			return "DATA INSERTED SUCCESSFULLY.";
		}catch(PDOException $e){
			return $e;
		}
	}
	
	public function lastId(){
		return $this->connect->lastInsertId();
	}
	function total_row()
	{
		$this->execute_query();
		return $this->statement->rowCount();
	}
	
	function query_result()
	{
		$this->execute_query();
		return $this->statement->fetchAll();
	}
	
	function clean_data($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
}

?>