<?php

class Examination {
	
	var $host;
	var $username;
	var $password;
	var $database;
	var $connect;
	var $query;
	var $data;
	var $statement;
	
	function __construct()
	{
		$this->host = 'localhost';
		$this->username = 'root';
		$this->password = '';
		$this->database = 'onlineexam';
		//$this->home_page = 'http://localhost/tutorial/online_examination/';
	
		$this->connect = new PDO("mysql:host=$this->host; dbname=$this->database", "$this->username", "$this->password");
	
		//session_start();
	}
	
	public function execute_query()
	{
		echo "HI";
		/*$this->statement = $this->connect->prepare($this->query);
		$this->statement->execute($this->data);*/
	}
	
	public function total_row()
	{
		$this->execute_query();
		return $this->statement->rowCount();
	}
	
	public function query_result()
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