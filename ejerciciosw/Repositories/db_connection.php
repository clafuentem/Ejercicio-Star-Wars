<?php

namespace VisualPublinet\StarWars\Repositories;

/**
 * Class for insert data on DB
 */
class Db_Connection {

	/**
	 * Open Connection to the DB
	 *
	 * @return void
	 */
	public function open_connection() {

		$mysqli = mysqli_connect( 'localhost', 'root', 'root', 'star_wars' );

		if ( $mysqli->connect_error ) {
			die();
		}

		return $mysqli;
	}

	/**
	 * Close connection to the DB
	 *
	 * @param [type] $mysqli
	 * @return void
	 */
	public function close_connection( $mysqli ) {
		$mysqli->close();
	}

}
