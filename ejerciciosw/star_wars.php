<?php

namespace VisualPublinet\StarWars;

require 'Utils/data_collection.php';
require 'Utils/export_data.php';
require 'Controllers/planets_control.php';
require 'Controllers/characters_control.php';
require 'Controllers/starships_control.php';
require 'Controllers/request_control.php';
require 'Controllers/form_control.php';
require 'Repositories/planets_insert.php';
require 'Repositories/characters_insert.php';
require 'Repositories/starships_insert.php';
require 'Repositories/db_connection.php';


use VisualPublinet\StarWars\Controllers\Request_Controll;


/**
 * Main class with function callbacks
 */
class Star_Wars {

	/**
	 * Callback to request function
	 *
	 * @return void
	 */
	public function request() {

		return Request_Controll::multi_request();

	}

}

$sw = new Star_Wars();

$sw->request();





