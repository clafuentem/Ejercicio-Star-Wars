<?php

namespace VisualPublinet\StarWars\Repositories;

use VisualPublinet\StarWars\Repositories\Db_Connection;

/**
 * Insert characters atributes in DB
 */
class Characters_Insert {

	/**
	 * Insert characters names and has_brown_hair
	 *
	 * @return void
	 */
	public function do_name_insert( $array ) {
		$mysqli = Db_Connection::open_connection();

		$table = 'CREATE TABLE IF NOT EXISTS tCharacters_hair (
			id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
			name VARCHAR(255) NOT NULL,
			has_brown_hair VARCHAR(255) NOT NULL
			)';

		if ( $mysqli->query( $table ) != true ) {
			$mysqli->error;
		} 

		if ( empty( $array ) ) {
			return;
		}

		foreach ( $array as $item ) {
			$name = '';
			$hair = '';
			if ( ! empty( $item['name'] ) && ! empty( $item['has_brown_hair'] ) ) {

				$hair = $item['has_brown_hair'];
				$name = $item['name'];
				$sql  = 'SELECT * FROM tCharacters_hair WHERE name = ? AND has_brown_hair = ?';
				$stmt = $mysqli->prepare( $sql );
				$stmt->bind_param( 'ss', $name, $hair );
				$stmt->execute();
				$result = $stmt->get_result();

				if ( $result->num_rows <= 0 ) {

					$sql_s = 'INSERT INTO tCharacters_hair (name,has_brown_hair) VALUES (?,?)';
					$stmt  = $mysqli->prepare( $sql_s );
					$stmt->bind_param( 'ss', $name, $hair );
					$stmt->execute();
					$stmt->close();

				} 
			}
		}

		Db_Connection::close_connection( $mysqli );

	}

	/**
	 * Insert characters names and his films
	 *
	 * @return void
	 */
	public function do_films_insert( $array ) {

		$mysqli = Db_Connection::open_connection();

		$table = 'CREATE TABLE IF NOT EXISTS tCharacters_films (
			id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
			name VARCHAR(255) NOT NULL,
			films INT(10) NOT NULL
			)';

		if ( $mysqli->query( $table ) != true ) {
			$mysqli->error;
		} 

		if ( empty( $array ) ) {
			return;
		}

		foreach ( $array as $item ) {
			$name = '';
			$films = '';
			if ( ! empty( $item['name'] ) && ! empty( $item['num_films'] ) ) {

				$films = $item['num_films'];
				$name = $item['name'];
				$sql  = 'SELECT * FROM tCharacters_films WHERE name = ? AND films = ?';
				$stmt = $mysqli->prepare( $sql );
				$stmt->bind_param( 'si', $name, $films );
				$stmt->execute();
				$result = $stmt->get_result();

				if ( $result->num_rows <= 0 ) {

					$sql_s = 'INSERT INTO tCharacters_films (name,films) VALUES (?,?)';
					$stmt  = $mysqli->prepare( $sql_s );
					$stmt->bind_param( 'si', $name, $films );
					$stmt->execute();
					$stmt->close();

				} 
			}
		}

		Db_Connection::close_connection( $mysqli );

	}

}
