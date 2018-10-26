<?php

namespace RentACar\Base;

use RentACar\Base\Router;

require_once 'utility/DB.php';
require_once 'models/Car.php';
require_once 'models/Rent.php';
require_once 'utility/Router.php';

$router = new Router();
$router->render();