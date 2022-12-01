<?php

namespace VisualPublinet\StarWars\Controllers;

use VisualPublinet\StarWars\Utils\Data_Collection;
use VisualPublinet\StarWars\Utils\Export_Data;
use VisualPublinet\StarWars\Repositories\Db_Insert;

/**
 * Starships control parameters
 */
class Starships_Control {

	/**
	 * Save the api pages of Starships
	 *
	 * @return void
	 */
	public static function pages_starships() {
		$data_collection = new Data_Collection();
		$data            = $data_collection->data_collection( 'https://swapi.dev/api/starships/?format=json' );
		$page_starships  = array( 'https://swapi.dev/api/starships/?format=json' );

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}
		while ( ! empty( $data['next'] ) ) {
			$page_starships[] = $data['next'];
			$data             = $data_collection->data_collection( $data['next'] );
		}

		return $page_starships;

	}

	/**
	 * Starships names
	 *
	 * @return void
	 */
	public static function starships_names( $data, $page ) {
		$starships_names = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $starship ) {
					if ( is_array( $starship ) && ! empty( $starship ) && key_exists( 'name', $starship ) ) {
						$starships_names[] = array(
							'name' => $starship['name'],
						);
					}
				}
			}
		}

		 Db_Insert::db_insert_starships( $starships_names, 'name' );

		Export_Data::export_json( $starships_names, 'Starships/Name/starships_names_page_' . $page . '.json' );

	}

	/**
	 * Starships manufacturer
	 *
	 * @return void
	 */
	public static function starships_manufact( $data, $page ) {
		$starships_manufact = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $starship ) {
					if ( is_array( $starship ) && ! empty( $starship ) && key_exists( 'manufacturer', $starship ) ) {
						$starships_manufact[] = array(
							'manufacturer' => $starship['manufacturer'],
						);
					}
				}
			}
		}

		Db_Insert::db_insert_starships( $starships_manufact, 'manufact' );

		Export_Data::export_json( $starships_manufact, 'Starships/Manufacturer/starships_manufact_page_'.$page.'.json' );

	}

	/**
	 * Starships consumables
	 *
	 * @return void
	 */
	public static function starships_consumables( $data, $page ) {
		$starships_consumables = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $starship ) {
					if ( is_array( $starship ) && ! empty( $starship ) && key_exists( 'consumables', $starship ) && key_exists( 'name', $starship ) ) {

						if ( strpos( $starship['consumables'], 'year' ) ) {
							$consumables = intval( $starship['consumables'] );
							$consumables = $consumables * 365 * 24;
						} elseif ( strpos( $starship['consumables'], 'day' ) ) {
							$consumables = intval( $starship['consumables'] );
							$consumables = $consumables * 24;
						} elseif ( strpos( $starship['consumables'], 'week' ) ) {
							$consumables = intval( $starship['consumables'] );
							$consumables = $consumables * 7 * 24;
						} elseif ( strpos( $starship['consumables'], 'month' ) ) {
							$consumables = intval( $starship['consumables'] );
							$consumables = $consumables * 30 * 24;
						} elseif ( strpos( $starship['consumables'], 'hour' ) ) {
							$consumables = intval( $starship['consumables'] );
						} else {
							$consumables = 0;
						}

						$starships_consumables[] = array(
							'name'                 => $starship['name'],
							'consumables_in_hours' => $consumables,
						);
						$consumables             = 0;
					}
				}
			}
		}

		Db_Insert::db_insert_starships( $starships_consumables, 'consumables' );

		Export_Data::export_json( $starships_consumables, 'Starships/Consumables/starships_consumables_page_'.$page.'.json' );

	}

}


