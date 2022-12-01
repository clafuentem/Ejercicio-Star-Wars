<?php

namespace VisualPublinet\StarWars\Repositories;

/**
 * Class for insert data on DB
 */
class Db_Insert {

	/**
	 * Insert data Planets in DB
	 *
	 * @return void
	 */
	public static function db_insert_planets( $array, $op ) {

		require_once 'db_connection.php';

		$mysqli = open_connection();

		if ( empty( URL ) ) {
			return;
		}

		if ( empty( $op ) ) {
			return;
		}

		if ( 'planets' === URL ) {

			if ( 'name' === $op ) {
				$sql = 'INSERT INTO tPlanets_names (name) VALUES ';

				foreach ( $array as $item ) {
					$name = $item['name'];
					$sql .= "('$name'),";
				}
				$sql = substr( $sql, 0, -1 );
				$sql = $sql . ';';

				if ( ! $mysqli->query( $sql ) ) {
					echo 'Falló la insercción en tabla: (' . $mysqli->errno . ') ' . $mysqli->error;
				}
			} elseif ( 'terrain' === $op ) {

				$sql = 'INSERT INTO tTerrains (terrain) VALUES ';

				foreach ( $array as $item ) {
					$terrain = $item['terrain'];
					$sql    .= "('$terrain'),";
				}
				$sql = substr( $sql, 0, -1 );
				$sql = $sql . ';';

				if ( ! $mysqli->query( $sql ) ) {
					echo 'Falló la insercción en tabla: (' . $mysqli->errno . ') ' . $mysqli->error;
				}
			} elseif ( 'climate' === $op ) {

				$sql = 'INSERT INTO tClimates (climate) VALUES ';

				foreach ( $array as $item ) {
					$climate = $item['climate'];
					$sql    .= "('$climate'),";
				}
				$sql = substr( $sql, 0, -1 );
				$sql = $sql . ';';

				if ( ! $mysqli->query( $sql ) ) {
					echo 'Falló la insercción en tabla: (' . $mysqli->errno . ') ' . $mysqli->error;
				}
			} elseif ( 'days' == $op ) {

				$sql = 'INSERT INTO tPlanets_days (name, days) VALUES ';

				foreach ( $array as $item ) {
					$name = $item['name'];
					$days = $item['days_per_year'];
					$sql .= "('$name',$days),";
				}
				$sql = substr( $sql, 0, -1 );
				$sql = $sql . ';';

				if ( ! $mysqli->query( $sql ) ) {
					echo 'Falló la insercción en tabla: (' . $mysqli->errno . ') ' . $mysqli->error;
				}
			}

			close_connection( $mysqli );
		}

	}


	/**
	 * Insert data Characters in DB
	 *
	 * @return void
	 */
	public static function db_insert_characters( $array, $op ) {

		require_once 'db_connection.php';

		$mysqli = open_connection();

		if ( empty( URL ) ) {
			return;
		}

		if ( empty( $op ) ) {
			return;
		}

		if ( 'characters' === URL ) {

			if ( 'name' === $op ) {
				$sql = 'INSERT INTO tCharacters_hair (name, has_brown_hair) VALUES ';

				foreach ( $array as $item ) {
					$name = $item['name'];
					$hair = $item['has_brown_hair'];
					$sql .= "('$name', '$hair'),";
				}
				$sql = substr( $sql, 0, -1 );
				$sql = $sql . ';';

				if ( ! $mysqli->query( $sql ) ) {
					echo 'Falló la insercción en tabla: (' . $mysqli->errno . ') ' . $mysqli->error;
				}
			} elseif ( 'films' === $op ) {

				$sql = 'INSERT INTO tCharacters_films (name, films) VALUES ';

				foreach ( $array as $item ) {
					$name  = $item['name'];
					$films = $item['num_films'];
					$sql  .= "('$name', $films),";
				}
				$sql = substr( $sql, 0, -1 );
				$sql = $sql . ';';

				if ( ! $mysqli->query( $sql ) ) {
					echo 'Falló la insercción en tabla: (' . $mysqli->errno . ') ' . $mysqli->error;
				}
			}

			close_connection( $mysqli );
		}

	}

	/**
	 * Insert data Starships in DB
	 *
	 * @return void
	 */
	public static function db_insert_starships( $array, $op ) {

		require_once 'db_connection.php';

		$mysqli = open_connection();

		if ( empty( URL ) ) {
			return;
		}

		if ( empty( $op ) ) {
			return;
		}

		if ( 'starships' === URL ) {

			if ( 'name' === $op ) {

				$sql = 'INSERT INTO tStarships_name (name) VALUES ';

				foreach ( $array as $item ) {
					$name = $item['name'];
					$sql .= "('$name'),";
				}
				$sql = substr( $sql, 0, -1 );
				$sql = $sql . ';';

				if ( ! $mysqli->query( $sql ) ) {
					echo 'Falló la insercción en tabla: (' . $mysqli->errno . ') ' . $mysqli->error;
				}
			} elseif ( 'manufact' === $op ) {

				$sql = 'INSERT INTO tManufacturer (name) VALUES ';

				foreach ( $array as $item ) {
					$name  = $item['manufacturer'];
					$sql  .= "('$name'),";
				}
				$sql = substr( $sql, 0, -1 );
				$sql = $sql . ';';

				if ( ! $mysqli->query( $sql ) ) {
					echo 'Falló la insercción en tabla: (' . $mysqli->errno . ') ' . $mysqli->error;
				}
			} elseif ( 'consumables' === $op ) {

				$sql = 'INSERT INTO tConsumables (name, consumables_in_hours) VALUES ';

				foreach ( $array as $item ) {
					$name  = $item['name'];
                    $consumables = $item['consumables_in_hours'];
					$sql  .= "('$name', $consumables),";
				}
				$sql = substr( $sql, 0, -1 );
				$sql = $sql . ';';

				if ( ! $mysqli->query( $sql ) ) {
					echo 'Falló la insercción en tabla: (' . $mysqli->errno . ') ' . $mysqli->error;
				}
			}

			close_connection( $mysqli );
		}

	}

}
