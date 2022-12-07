<?php

namespace VisualPublinet\StarWars\Repositories;

use VisualPublinet\StarWars\Repositories\Db_Connection;


/**
 * Insert planets atributes in DB
 */
class Planets_Insert {

	/**
	 * Insert planets names
	 *
	 * @return void
	 */
	public function do_name_insert( $array ) {

		$mysqli = Db_Connection::open_connection();

		$table = 'CREATE TABLE IF NOT EXISTS tPlanets_names (
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
				$sql  = 'SELECT * FROM tPlanets_names WHERE name = ? ';
				$stmt = $mysqli->prepare( $sql );
				$stmt->bind_param( 's', $name );
				$stmt->execute();
				$result = $stmt->get_result();

				if ( $result->num_rows <= 0 ) {

					$sql_s = 'INSERT INTO tPlanets_names (name) VALUES (?)';
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
	 * Insert planets terrains
	 *
	 * @return void
	 */
	public function do_terrain_insert( $array ) {
		$mysqli = Db_Connection::open_connection();

		$table = 'CREATE TABLE IF NOT EXISTS tTerrains (
			id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
			terrain VARCHAR(255) NOT NULL
			)';

		if ( $mysqli->query( $table ) != true ) {
			$mysqli->error;
		} 

		if ( empty( $array ) ) {
			return;
		}

		foreach ( $array as $item ) {
			$terrain = '';
			if ( ! empty( $item['terrain'] ) ) {

				$terrain = $item['terrain'];
				$sql     = 'SELECT * FROM tTerrains WHERE terrain = ? ';
				$stmt    = $mysqli->prepare( $sql );
				$stmt->bind_param( 's', $terrain );
				$stmt->execute();
				$result = $stmt->get_result();

				if ( $result->num_rows <= 0 ) {

					$sql_s = 'INSERT INTO tTerrains (terrain) VALUES (?)';
					$stmt  = $mysqli->prepare( $sql_s );
					$stmt->bind_param( 's', $terrain );
					$stmt->execute();
					$stmt->close();

				}
			}
		}

		Db_Connection::close_connection( $mysqli );
	}

	/**
	 * Insert planets climates
	 *
	 * @return void
	 */
	public function do_climate_insert( $array ) {
		$mysqli = Db_Connection::open_connection();

		$table = 'CREATE TABLE IF NOT EXISTS tClimates (
			id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
			climate VARCHAR(255) NOT NULL
			)';

		if ( $mysqli->query( $table ) != true ) {
			$mysqli->error;
		} 

		if ( empty( $array ) ) {
			return;
		}

		foreach ( $array as $item ) {
			$climate = '';
			if ( ! empty( $item['climate'] ) ) {

				$climate = $item['climate'];
				$sql     = 'SELECT * FROM tClimates WHERE climate = ? ';
				$stmt    = $mysqli->prepare( $sql );
				$stmt->bind_param( 's', $climate );
				$stmt->execute();
				$result = $stmt->get_result();

				if ( $result->num_rows <= 0 ) {

					$sql_s = 'INSERT INTO tClimates (climate) VALUES (?)';
					$stmt  = $mysqli->prepare( $sql_s );
					$stmt->bind_param( 's', $climate );
					$stmt->execute();
					$stmt->close();

				}
			}
		}

		Db_Connection::close_connection( $mysqli );
	}

	/**
	 * Insert planets names and days
	 *
	 * @return void
	 */
	public function do_days_insert( $array ) {
		$mysqli = Db_Connection::open_connection();

		$table = 'CREATE TABLE IF NOT EXISTS tPlanets_days (
			id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
			name VARCHAR(255) NOT NULL,
			days FLOAT NOT NULL
			)';

		if ( $mysqli->query( $table ) != true ) {
			$mysqli->error;
		} 

		if ( empty( $array ) ) {
			return;
		}

		foreach ( $array as $item ) {
			$name = '';
			$days = '';
			if ( ! empty( $item['name'] ) ) {

				$days = $item['days_per_year'];
				$name = $item['name'];
				$sql  = 'SELECT * FROM tPlanets_days WHERE name = ? AND days = ?';
				$stmt = $mysqli->prepare( $sql );
				$stmt->bind_param( 'sd', $name, $days );
				$stmt->execute();
				$result = $stmt->get_result();

				if ( $result->num_rows <= 0 ) {

					$sql_s = 'INSERT INTO tPlanets_days (name,days) VALUES (?,?)';
					$stmt  = $mysqli->prepare( $sql_s );
					$stmt->bind_param( 'sd', $name, $days );
					$stmt->execute();
					$stmt->close();

				} 
			}
		}

		Db_Connection::close_connection( $mysqli );
	}



}
