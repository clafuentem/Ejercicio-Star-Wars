<?php

namespace VisualPublinet\StarWars\Controllers;

use VisualPublinet\StarWars\Utils\Data_Collection;
use VisualPublinet\StarWars\Utils\Export_Data;
use VisualPublinet\StarWars\Repositories\Starships_Insert;

/**
 * Starships control parameters
 */
class Starships_Control {

	/**
	 * Save the api pages of Starships
	 *
	 * @return void
	 */
	public function pages_starships() {
		$url             = 'https://swapi.dev/api/starships/?format=json';
		$data_collection = new Data_Collection();
		$data            = $data_collection->data_collection( $url );
		$page_starships  = array( $url );

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
	public function starships_names( $data ) {
		$starships_names = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $starships ) {
					if ( is_array( $starships ) && ! empty( $starships ) ) {
						foreach ( $starships as $starship ) {
							if ( is_array( $starship ) && ! empty( $starship ) && key_exists( 'name', $starship ) ) {
								$starships_names[] = array(
									'name' => $starship['name'],
								);
							}
						}
					}
				}
			}
		}

		Starships_Insert::do_name_insert( $starships_names );

		$file = 'Starships/Name/starships_names.json';

		Export_Data::export_json( $starships_names, $file );

	}

	/**
	 * Starships manufacturer
	 *
	 * @return void
	 */
	public function starships_manufact( $data ) {
		$starships_manufact = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $starships ) {
					if ( is_array( $starships ) && ! empty( $starships ) ) {
						foreach ( $starships as $starship ) {
							if ( is_array( $starship ) && ! empty( $starship ) && key_exists( 'manufacturer', $starship ) ) {
								$starships_manufact[] = array(
									'manufacturer' => $starship['manufacturer'],
								);
							}
						}
					}
				}
			}
		}

		Starships_Insert::do_manufact_insert( $starships_manufact );

		$file = 'Starships/Manufacturer/starships_manufact.json';

		Export_Data::export_json( $starships_manufact, $file );

	}

	/**
	 * Starships consumables
	 *
	 * @return void
	 */
	public function starships_consumables( $data ) {
		$starships_consumables = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $starships ) {
					if ( is_array( $starships ) && ! empty( $starships ) ) {
						foreach ( $starships as $starship ) {
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
			}
		}

		Starships_Insert::do_consumables_insert( $starships_consumables );

		$file = 'Starships/Consumables/starships_consumables.json';

		Export_Data::export_json( $starships_consumables, $file );

	}

}


