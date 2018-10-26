<?php

namespace RentACar\Base;

use RentACar\Base\DB;

/**
* Handles CAR insert and SELECTs
*/
class Car
{
	private $dbObj = null;

	public function __construct()
	{
		$this->dbObj = new DB();
	}

	public function getCars()
	{
		$dbObj = $this->dbObj;
		$pdo = $dbObj->connect();

		$stmt = $pdo->prepare('
			SELECT ID,
			MODEL,
			YEAR_OF_PRODUCTION,
			NUMBER_OF_DOORS,
			GEARBOX,
			HORSE_POWER,
			MILLAGE,
			DETAILS

			FROM car
		');

		$stmt->execute();

		$cars = [];
		while ($row = $stmt->fetch()){
			$cars[] = $row;
		}

		return $cars;
	}

	public function insert($data)
	{
		if (empty($data)) {
			return false;
		}

		$dbObj = $this->dbObj;
		$pdo = $dbObj->connect();
	 	
		if (!isset($data['DATE_ADDED'])) {
			$data['DATE_ADDED'] = date("Y-m-d");
		}

		$stmt = $pdo->prepare('
			INSERT INTO CAR(MODEL, YEAR_OF_PRODUCTION, NUMBER_OF_DOORS,
				GEARBOX, HORSE_POWER, MILLAGE, DETAILS, DATE_ADDED) 
				VALUES('.'\''.$data['MODEL'] .'\', \''. $data['YEAR_OF_PRODUCTION'] .'-01-01\','. $data['NUMBER_OF_DOORS'] .',\''.
				$data['GEARBOX'] .'\','. $data['HORSE_POWER'] .','. $data['MILLAGE'] .', \''.$data['DETAILS'] .'\', \''. $data['DATE_ADDED'].'\')'
		);


		//if true insert is successfull
		if ($stmt->execute()) {
			return true;
		}
		
		return false;
	}
}