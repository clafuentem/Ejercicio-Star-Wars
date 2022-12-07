<?php

namespace VisualPublinet\StarWars\Controllers;

use VisualPublinet\StarWars\Utils\Data_Collection;
use VisualPublinet\StarWars\Utils\Export_Data;
use VisualPublinet\StarWars\Repositories\Characters_Insert;

/**
 * Characters control parameters
 */
class Characters_Control {

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function pages_characters() {
		$url             = 'https://swapi.dev/api/people/?format=json';
		$data_collection = new Data_Collection();
		$data            = $data_collection->data_collection( $url );
		$page_characters = array( $url );

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
	public function characters_hair( $data ) {
		$characters_hair = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $characters ) {
					if ( is_array( $characters ) && ! empty( $characters ) ) {
						foreach ( $characters as $character ) {
							if ( is_array( $character ) && ! empty( $character ) && key_exists( 'hair_color', $character ) && key_exists( 'name', $character ) ) {
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
		}

		
		Characters_Insert::do_name_insert( $characters_hair );

		$file = 'Characters/Hair/characters_hair.json';

		Export_Data::export_json( $characters_hair, $file );

	}

	/**
	 * Characters films count
	 *
	 * @return void
	 */
	public function characters_films( $data ) {
		$count            = 0;
		$films            = array();
		$characters_films = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $characters ) {
					if ( is_array( $characters ) && ! empty( $characters ) ) {
						foreach ( $characters as $character ) {
							if ( is_array( $character ) && ! empty( $character ) && key_exists( 'name', $character ) && key_exists( 'films', $character ) ) {
								$films[] = array(
									'name'  => $character['name'],
									'films' => $character['films'],
								);
							}
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


		
		Characters_Insert::do_films_insert( $characters_films );
		

		$file = 'Characters/Films/characters_films.json';

		
		Export_Data::export_json( $characters_films, $file );
		 

	}


}
