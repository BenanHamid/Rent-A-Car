<?php

namespace RentACar\Base;

require_once '../models/Car.php';
require_once '../utility/DB.php';

use RentACar\Base\Car;

$carObj = new Car();

if(isset($_POST['submit-insert'])) {
 	$data['MODEL'] = $_POST['field-model'];
	$data['YEAR_OF_PRODUCTION'] = $_POST['field-year_of_production'];
	$data['NUMBER_OF_DOORS'] = $_POST['field-number_of_doors'];
	$data['GEARBOX'] = $_POST['field-gearbox'];
	$data['HORSE_POWER'] = $_POST['field-horse_power'];
	$data['MILLAGE'] = $_POST['field-millage'];
	$data['DETAILS'] = $_POST['field-details'];

	if ($data['GEARBOX'] == 1) {
		$data['GEARBOX'] = 'автоматична';
	} elseif ($data['GEARBOX'] == 2) {
		$data['GEARBOX'] = 'полу-автоматична';
	} elseif ($data['GEARBOX'] == 3) {
		$data['GEARBOX'] = 'ръчна';
	}

 	$carObj->insert($data);

 	header('Location: ' . $_SERVER['HTTP_REFERER']);
 	exit;
}