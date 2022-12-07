<?php

namespace VisualPublinet\StarWars\Controllers;

use VisualPublinet\StarWars\Utils\Data_Collection;
use VisualPublinet\StarWars\Utils\Export_Data;
use VisualPublinet\StarWars\Repositories\Planets_Insert;

/**
 * Planets control parameters
 */
class Planets_Control {



	/**
	 * Save the api pages of Starships
	 *
	 * @return void
	 */
	public function pages_planets() {
		$url             = 'https://swapi.dev/api/planets/?format=json';
		$data_collection = new Data_Collection();
		$data            = $data_collection->data_collection( $url );
		$page_planets    = array( $url );

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}
		while ( ! empty( $data['next'] ) ) {
			$page_planets[] = $data['next'];
			$data           = $data_collection->data_collection( $data['next'] );
		}

		return $page_planets;

	}


	/**
	 * Planets names
	 *
	 * @return void
	 */
	public function planets_names( $data ) {
		$planets_name = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $planets ) {
					if ( is_array( $planets ) && ! empty( $planets ) ) {
						foreach ( $planets as $planet ) {
							if ( is_array( $planet ) && ! empty( $planet ) && key_exists( 'name', $planet ) ) {
								$planets_names[] = array(
									'name' => $planet['name'],
								);
							}
						}
					}
				}
			}
		}

		Planets_Insert::do_name_insert( $planets_names );

		$file = 'Planets/Name/planets_names.json';

		Export_Data::export_json( $planets_names, $file );

	}

	/**
	 * Planets climates
	 *
	 * @return void
	 */
	public function planets_climates( $data ) {
		$planets_climate = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $planets ) {
					if ( is_array( $planets ) && ! empty( $planets ) ) {
						foreach ( $planets as $planet ) {
							if ( is_array( $planet ) && ! empty( $planet ) && key_exists( 'climate', $planet ) ) {
								$planets_climate[] = array(
									'climate' => $planet['climate'],
								);
							}
						}
					}
				}
			}
		}

		Planets_Insert::do_climate_insert( $planets_climate );

		$file = 'Planets/Climate/planets_climate.json';

		Export_Data::export_json( $planets_climate, $file );

	}

	/**
	 * Planets Terrains
	 *
	 * @return void
	 */
	public function planets_terrains( $data ) {
		$planets_terrain = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $planets ) {
					if ( is_array( $planets ) && ! empty( $planets ) ) {
						foreach ( $planets as $planet ) {
							if ( is_array( $planet ) && ! empty( $planet ) && key_exists( 'climate', $planet ) ) {
								$planets_terrain[] = array(
									'terrain' => $planet['terrain'],
								);
							}
						}
					}
				}
			}
		}

		Planets_Insert::do_terrain_insert( $planets_terrain );

		$file = 'Planets/Terrain/planets_terrain.json';

		Export_Data::export_json( $planets_terrain, $file );

	}

	/**
	 * Planets days
	 *
	 * @return void
	 */

	public function planets_days( $data ) {
		$planets_days = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $planets ) {
					if ( is_array( $planets ) && ! empty( $planets ) ) {
						foreach ( $planets as $planet ) {
							if ( is_array( $planet ) && ! empty( $planet ) && key_exists( 'orbital_period', $planet ) && key_exists( 'rotation_period', $planet ) && key_exists( 'name', $planet ) ) {

								$orbital  = intval( $planet['orbital_period'] );
								$rotation = intval( $planet['rotation_period'] );

								if ( 0 === $orbital || 0 === $rotation ) {
									$days = 0;
								} else {
									$days = round( $orbital / $rotation, 3 );
								}

								$planets_days[] = array(
									'name'          => $planet['name'],
									'days_per_year' => $days,
								);

							}
						}
					}
				}
			}
		}

		Planets_Insert::do_days_insert( $planets_days );

		$file = 'Planets/Days/planets_days.json';

		Export_Data::export_json( $planets_days, $file );

	}

}
