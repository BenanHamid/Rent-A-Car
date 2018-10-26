<?php

namespace RentACar\Base;

use PDO;

if(count(get_included_files()) === 1) exit("Direct access not permitted."); 

class DB
{
	private $host = '127.0.0.1';
	private $db   = 'rent_a_car';
	private $user = 'root';
	private $pass = 'root';
	private $charset = 'utf8mb4';

	private $dsn = "";
	private $opt = [
	    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	    PDO::ATTR_EMULATE_PREPARES   => false,
	];

	function __construct($host = null, $db = null, $user = null, 
			$pass = null, $charset = null, $dsn = null, $opt = null)
	{
		if (isset($host) && isset($db) && isset($user) && isset($pass) &&
				isset($charset) && isset($opt)) {
			$this->host = $host;
			$this->db = $db;
			$this->user = $user;
			$this->pass = $pass;
			$this->charset = $charset;
			$this->opt = $opt;
		}
	}

	public function connect()
	{
		try {
			$dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
			$pdo = new PDO($dsn, $this->user, $this->pass, $this->opt);

			return $pdo;
		} catch (Exception $e) {
			echo 'There was an error connecting to the DB!';
			die();
		}
	}
}