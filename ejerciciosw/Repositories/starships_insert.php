<?php

namespace VisualPublinet\StarWars\Repositories;

use VisualPublinet\StarWars\Repositories\Db_Connection;

/**
 * Insert starships atributes in DB
 */
class Starships_Insert {

	/**
	 * Insert starships names
	 *
	 * @return void
	 */
	public function do_name_insert( $array ) {

		$mysqli = Db_Connection::open_connection();

		$table = 'CREATE TABLE IF NOT EXISTS tStarships_name (
			id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
			name VARCHAR(255) NOT NULL
			)';

		if ( $mysqli->query( $table ) != true ) {
			$mysqli->error;
		} 

		if ( empty( $array ) ) {
			return;
		}

		foreach ( $array as $item ) {
			$name = '';
			if ( ! empty( $item['name'] ) ) {

				$name = $item['name'];
				$sql  = 'SELECT * FROM tStarships_name WHERE name = ? ';
				$stmt = $mysqli->prepare( $sql );
				$stmt->bind_param( 's', $name );
				$stmt->execute();
				$result = $stmt->get_result();

				if ( $result->num_rows <= 0 ) {

					$sql_s = 'INSERT INTO tStarships_name (name) VALUES (?)';
					$stmt  = $mysqli->prepare( $sql_s );
					$stmt->bind_param( 's', $name );
					$stmt->execute();
					$stmt->close();

				}
			}
		}

		Db_Connection::close_connection( $mysqli );

	}

	/**
	 * Insert starships manufacturer
	 *
	 * @return void
	 */
	public function do_manufact_insert( $array ) {

		$mysqli = Db_Connection::open_connection();

		$table = 'CREATE TABLE IF NOT EXISTS tManufacturer (
			id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
			name VARCHAR(255) NOT NULL
			)';

		if ( $mysqli->query( $table ) != true ) {
			$mysqli->error;
		} 

		if ( empty( $array ) ) {
			return;
		}

		foreach ( $array as $item ) {
			$name = '';
			if ( ! empty( $item['manufacturer'] ) ) {

				$name = $item['manufacturer'];
				$sql  = 'SELECT * FROM tManufacturer WHERE name = ? ';
				$stmt = $mysqli->prepare( $sql );
				$stmt->bind_param( 's', $name );
				$stmt->execute();
				$result = $stmt->get_result();

				if ( $result->num_rows <= 0 ) {

					$sql_s = 'INSERT INTO tManufacturer (name) VALUES (?)';
					$stmt  = $mysqli->prepare( $sql_s );
					$stmt->bind_param( 's', $name );
					$stmt->execute();
					$stmt->close();

				}
			}
		}

		Db_Connection::close_connection( $mysqli );

	}

	/**
	 * Insert starships names and his consumables
	 *
	 * @return void
	 */
	public function do_consumables_insert( $array ) {

		$mysqli = Db_Connection::open_connection();

		$table = 'CREATE TABLE IF NOT EXISTS tConsumables (
			id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
			name VARCHAR(255) NOT NULL,
			consumables_in_hours INT(11) NOT NULL
			)';

		if ( $mysqli->query( $table ) != true ) {
			$mysqli->error;
		} 

		if ( empty( $array ) ) {
			return;
		}

		foreach ( $array as $item ) {
			$name        = '';
			$consumables = '';
			if ( ! empty( $item['name'] ) ) {

				$consumables = $item['consumables_in_hours'];
				$name        = $item['name'];
				$sql         = 'SELECT * FROM tConsumables WHERE name = ? AND consumables_in_hours = ?';
				$stmt        = $mysqli->prepare( $sql );
				$stmt->bind_param( 'si', $name, $consumables );
				$stmt->execute();
				$result = $stmt->get_result();

				if ( $result->num_rows <= 0 ) {

					$sql_s = 'INSERT INTO tConsumables (name,consumables_in_hours) VALUES (?,?)';
					$stmt  = $mysqli->prepare( $sql_s );
					$stmt->bind_param( 'si', $name, $consumables );
					$stmt->execute();
					$stmt->close();

				}
			}
		}

		Db_Connection::close_connection( $mysqli );

	}

}
