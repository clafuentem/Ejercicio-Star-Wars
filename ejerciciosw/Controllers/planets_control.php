<?php

namespace VisualPublinet\StarWars\Controllers;

use VisualPublinet\StarWars\Utils\Data_Collection;
use VisualPublinet\StarWars\Utils\Export_Data;
use VisualPublinet\StarWars\Repositories\Db_Insert;

/**
 * Planets control parameters
 */
class Planets_Control {

	/**
	 * Save the api pages of Starships
	 *
	 * @return void
	 */
	public static function pages_planets() {
		$data_collection = new Data_Collection();
		$data            = $data_collection->data_collection( 'https://swapi.dev/api/planets/?format=json' );
		$page_planets    = array( 'https://swapi.dev/api/planets/?format=json' );

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
	public static function planets_names( $data, $page ) {
		$planets_name = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $planet ) {
					if ( is_array( $planet ) && ! empty( $planet ) && key_exists( 'name', $planet ) ) {
						$planets_name[] = array(
							'name' => $planet['name'],
						);

					}
				}
			}
		}

		Db_Insert::db_insert_planets( $planets_name, 'name' );

		Export_Data::export_json( $planets_name, 'Planets/Name/planets_names_page_' . $page . '.json' );

	}

	/**
	 * Planets climates
	 *
	 * @return void
	 */
	public static function planets_climates( $data, $page ) {
		$planets_climate = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $planet ) {
					if ( is_array( $planet ) && ! empty( $planet ) && key_exists( 'climate', $planet ) ) {
						$planets_climate[] = array(
							'climate' => $planet['climate'],
						);
					}
				}
			}
		}

		Db_Insert::db_insert_planets( $planets_climate, 'climate' );

		Export_Data::export_json( $planets_climate, 'Planets/Climate/planets_climate_page_' . $page . '.json' );

	}

	/**
	 * Planets Terrains
	 *
	 * @return void
	 */
	public static function planets_terrains( $data, $page ) {
		$planets_terrain = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $planet ) {
					if ( is_array( $planet ) && ! empty( $planet ) && key_exists( 'terrain', $planet ) ) {
						$planets_terrain[] = array(
							'terrain' => $planet['terrain'],
						);
					}
				}
			}
		}

		Db_Insert::db_insert_planets( $planets_terrain, 'terrain' );

		Export_Data::export_json( $planets_terrain, 'Planets/Terrain/planets_terrain_page_' . $page . '.json' );

	}

	/**
	 * Planets days
	 *
	 * @return void
	 */

	public static function planets_days( $data, $page ) {
		$planets_days = array();

		if ( ! is_array( $data ) || empty( $data ) ) {
			return;
		}

		foreach ( $data as $elements ) {
			if ( is_array( $elements ) && ! empty( $elements ) ) {
				foreach ( $elements as $planet ) {
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

		Db_Insert::db_insert_planets( $planets_days, 'days' );

		Export_Data::export_json( $planets_days, 'Planets/Days/planets_days_page_' . $page . '.json' );

	}

}
