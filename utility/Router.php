<?php

namespace RentACar\Base;

if(count(get_included_files()) === 1) exit("Direct access not permitted."); 

/**
* Basic Page routing
*/
class Router
{
	
	public function render()
	{
		$page = '';

		if (!isset($_GET['page'])) {
			$page = 'home';
		}else {
			$page = $_GET['page'];
		}

		require_once 'pages' . DIRECTORY_SEPARATOR . 'header.php';
		require_once 'pages' . DIRECTORY_SEPARATOR . 'header-top.php';
		$pageFile = 'pages' . DIRECTORY_SEPARATOR . $page . '.php';
		if (file_exists($pageFile) && is_readable($pageFile)) {
			require_once $pageFile;
		}else {
			echo "404 page not found!";
		}

		require_once 'pages' . DIRECTORY_SEPARATOR . 'footer.php';
	}
}