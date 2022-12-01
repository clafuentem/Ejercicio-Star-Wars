<?php

namespace VisualPublinet\StarWars\Controllers;

use VisualPublinet\StarWars\Utils\Data_Collection;
use VisualPublinet\StarWars\Utils\Export_Data;
use VisualPublinet\StarWars\Repositories\Db_Insert;

/**
 * Characters control parameters
 */
class Characters_Control {

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public static function pages_characters() {
		$data_collection = new Data_Collection();
		$data            = $data_collection->data_collection( 'https://swapi.dev/api/people/?format=json' );
		$page_characters = array( 'https://swapi.dev/api/people/?format=json' );

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}
		while ( ! empty( $data['next'] ) ) {
			$page_characters[] = $data['next'];
			$data              = $data_collection->data_collection( $data['next'] );
		}

		return $page_characters;

	}

	/**
	 * Characters hair verification
	 *
	 * @return void
	 */
	public static function characters_hair( $data, $page ) {
		$characters_hair = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $character ) {
					if ( is_array( $character ) && ! empty( $character ) ) {
						if ( key_exists( 'hair_color', $character ) ) {
							if ( 'brown' === $character['hair_color'] ) {
								$verification = 'true';
							} else {
								$verification = 'false';
							}
							$characters_hair[] = array(
								'name'           => $character['name'],
								'has_brown_hair' => $verification,
							);
						}
					}
				}
			}
		}

		Db_Insert::db_insert_characters( $characters_hair, 'name' );

		Export_Data::export_json( $characters_hair, 'Characters/Hair/characters_hair_page_' . $page . '.json' );

	}

	/**
	 * Characters films count
	 *
	 * @return void
	 */
	public static function characters_films( $data, $page ) {
		$count            = 0;
		$films            = array();
		$characters_films = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $character ) {
					if ( is_array( $character ) && ! empty( $character ) ) {
						if ( key_exists( 'name', $character ) && key_exists( 'films', $character ) ) {
							$films[] = array(
								'name'  => $character['name'],
								'films' => $character['films'],
							);
						}
					}
				}
			}
		}

		if ( ! is_array( $films ) || empty( $films ) ) {
			return;
		}

		foreach ( $films as $character ) {
			if ( is_array( $character ) && ! empty( $character ) ) {
				foreach ( $character as $film ) {
					if ( is_array( $film ) && ! empty( $film ) ) {
						foreach ( $film as $fil ) {

							$count++;

						}
					}
				}
			}
			if ( key_exists( 'name', $character ) ) {
				$characters_films[] = array(
					'name'      => $character['name'],
					'num_films' => $count,
				);
			}

			$count = 0;
		}

		Db_Insert::db_insert_characters( $characters_films, 'films' );

		Export_Data::export_json( $characters_films, 'Characters/Films/characters_films_page' . $page . '.json' );

	}


}
