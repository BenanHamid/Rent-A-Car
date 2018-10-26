<?php

namespace RentACar\Base;

use RentACar\Base\DB;

/**
* For renting cars
*/
class Rent
{
	private $dbObj = null;

	public function __construct()
	{
		$this->dbObj = new DB();
	}

	public function getRents()
	{
		$dbObj = $this->dbObj;
		$pdo = $dbObj->connect();

		$stmt = $pdo->prepare('
			SELECT rent.ID,
			CAR_ID,
			car.MODEL,
			car.GEARBOX,
			car.HORSE_POWER,
			car.MILLAGE,
			RENT_PERIOD_START,
			RENT_PERIOD_END,
			BUSINESS_DAYS,
			TOTAL_RENT,
			car.YEAR_OF_PRODUCTION,
			car.NUMBER_OF_DOORS

			FROM rent
			INNER JOIN car
			ON rent.CAR_ID = car.ID
		');

		$stmt->execute();

		$cars = [];
		while ($row = $stmt->fetch()){
			$cars[] = $row;
		}

		return $cars;
	}

	public function getInvoice($data)
	{
		$dbObj = $this->dbObj;
		$pdo = $dbObj->connect();
		$filter = ' WHERE \'' . $data['RENT_PERIOD_END'] . '\' >= ' 
			. ' RENT_PERIOD_START AND '. '\'' . $data['RENT_PERIOD_START'] . '\' <= RENT_PERIOD_END';

		if ($data['MODEL']) {
			$filter .= ' AND car.MODEL LIKE \'' . $data['MODEL'] . '\'';
		}

		if ($data['YEAR_OF_PRODUCTION']) {
			$filter .= ' AND car.YEAR_OF_PRODUCTION = \'' . $data['YEAR_OF_PRODUCTION'] . '\'';
		}

		if ($data['NUMBER_OF_DOORS']) {
			$filter .= ' AND car.NUMBER_OF_DOORS = ' . $data['NUMBER_OF_DOORS'];
		}

		if ($data['GEARBOX']) {
			$filter .= ' AND car.GEARBOX LIKE \'' . $data['GEARBOX'] . '\'';
		}

		if ($data['HORSE_POWER']) {
			$filter .= ' AND car.HORSE_POWER = ' . $data['HORSE_POWER'];
		}

		// if ($data['MILLAGE']) {
		// 	$filter .= ' AND car.MILLAGE = ' . $data['MILLAGE'];
		// }

		$stmt = $pdo->prepare('
			SELECT
			car.MODEL,
			RENT_PERIOD_START,
			RENT_PERIOD_END,
			BUSINESS_DAYS,
			TOTAL_RENT

			FROM rent
			INNER JOIN car
			ON rent.CAR_ID = car.ID ' . $filter
		);

		$stmt->execute();

		$invoices = [];
		while ($row = $stmt->fetch()) {
			$invoices[] = $row;
		}

		if (!empty($invoices)) {
			return $invoices;
		}

		return false;
	}

	public function getEarliestRent(){
		$dbObj = $this->dbObj;
		$pdo = $dbObj->connect();

		$stmt = $pdo->prepare('
			SELECT MIN(RENT_PERIOD_START) as MIN_DATE,
			MAX(RENT_PERIOD_END) as MAX_DATE

			FROM rent
			LIMIT 1
		');

		$stmt->execute();

		$rent = $stmt->fetch();

		return $rent;
	}

	public function rent($data)
	{
		if (empty($data)) {
			return false;
		}

		$dbObj = $this->dbObj;
		$pdo = $dbObj->connect();
	 	
		if (!isset($data['DATE_ADDED'])) {
			$data['DATE_ADDED'] = date("Y-m-d");
		}

		$stmtSelect = $pdo->prepare('
			SELECT CAR_ID,
			RENT_PERIOD_START,
			RENT_PERIOD_END
			FROM RENT
			WHERE CAR_ID = ?
			AND (? BETWEEN RENT_PERIOD_START AND RENT_PERIOD_END
			OR (? BETWEEN RENT_PERIOD_START AND RENT_PERIOD_END))
			LIMIT 1
		');

		$stmtSelect->bindParam(1, $data['CAR_ID']);
		$stmtSelect->bindParam(2, $data['RENT_PERIOD_END']);
		$stmtSelect->bindParam(3, $data['RENT_PERIOD_START']);

		$stmtSelect->execute();

		$car = $stmtSelect->fetch();
		if (!empty($car)) {

			return $car;
		}

		$stmt = $pdo->prepare('
			INSERT INTO RENT(CAR_ID, RENT_PERIOD_START, RENT_PERIOD_END
				, BUSINESS_DAYS, TOTAL_RENT, DATE_ADDED) 
				VALUES('.'\''.$data['CAR_ID'] .'\', \''. $data['RENT_PERIOD_START'] .'\' , \''. $data['RENT_PERIOD_END'] .'\', ' . $data['BUSINESS_DAYS'] . ', '. $data['TOTAL_RENT'] . ', \''. 
			 		$data['DATE_ADDED'] . '\')'
		);


		//if true insert is successfull
		if ($stmt->execute()) {
			return true;
		}
		
		return false;
	}
}