<?php
namespace RentACar\Base;

require_once '../models/Rent.php';
require_once '../utility/DB.php';

use RentACar\Base\Rent;

$rentObj = new Rent();

if(isset($_POST['submit-rent'])){
	$data['CAR_ID'] = $_POST['car_id'];
	$data['RENT_PERIOD_START'] = $_POST['start_date'];
	$data['RENT_PERIOD_END'] = $_POST['end_date'];
	$data['BUSINESS_DAYS'] = $_POST['business_days'];
	$data['TOTAL_RENT'] = $_POST['total_rent'];

	$result = $rentObj->rent($data);

	if (is_array($result)) {
		$resultJson = json_encode($result);

		echo $resultJson;
		exit;
	}

	print_r($result);
	exit;
}

if(isset($_POST['submit-invoice'])){
	$data['RENT_PERIOD_START'] = $_POST['start_date_rent'];
	$data['RENT_PERIOD_END'] = $_POST['end_date_rent'];
	$data['MODEL'] = $_POST['model'];
	$data['YEAR_OF_PRODUCTION'] = $_POST['year_of_production'];
	$data['NUMBER_OF_DOORS'] = $_POST['number_of_doors'];
	$data['GEARBOX'] = $_POST['gearbox'];
	$data['HORSE_POWER'] = $_POST['horse_power'];

	$result = $rentObj->getInvoice($data);
	
	if (is_array($result)) {
		$resultJson = json_encode($result);

		echo $resultJson;
		exit;
	}

	print_r($result);
	exit;
}