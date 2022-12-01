<?php

namespace VisualPublinet\StarWars;

require 'Utils/data_collection.php';
require 'Utils/export_data.php';
require 'Controllers/planets_control.php';
require 'Controllers/characters_control.php';
require 'Controllers/starships_control.php';
require 'Repositories/db_insert.php';

use VisualPublinet\StarWars\Controllers\Characters_Control;
use VisualPublinet\StarWars\Controllers\Planets_Control;
use VisualPublinet\StarWars\Controllers\Starships_Control;
use VisualPublinet\StarWars\Utils\Data_Collection;

/**
 * Main class with function callbacks
 */
class Star_Wars {

	/**
	 * Callback to planets_name function
	 *
	 * @return void
	 */
	public function planets_names( $data, $page ) {

		return Planets_Control::planets_names( $data, $page );

	}

	/**
	 * Callback to planets_terrains function
	 *
	 * @return void
	 */
	public function planets_terrains( $data, $page ) {

		return Planets_Control::planets_terrains( $data, $page );

	}

	/**
	 * Callback to planets_climates function
	 *
	 * @return void
	 */
	public function planets_climates( $data, $page ) {

		return Planets_Control::planets_climates( $data, $page );

	}

	/**
	 * Callback to planets_days function
	 *
	 * @return void
	 */
	public function planets_days( $data, $page ) {

		return Planets_Control::planets_days( $data, $page );

	}

	/**
	 * Callback to characters_hair function
	 *
	 * @return void
	 */
	public function characters_hair( $data, $cont ) {

		return Characters_Control::characters_hair( $data, $cont );

	}

	/**
	 * Callback to characters_films function
	 *
	 * @return void
	 */
	public function characters_films( $data, $cont ) {

		return Characters_Control::characters_films( $data, $cont );

	}

	/**
	 * Callback to starships_names function
	 *
	 * @return void
	 */
	public function starships_names( $data, $cont ) {

		return Starships_Control::starships_names( $data, $cont );

	}

	/**
	 * Callback to starships_manufact function
	 *
	 * @return void
	 */
	public function starships_manufact( $data, $cont ) {

		return Starships_Control::starships_manufact( $data, $cont );

	}

	/**
	 * Callback to starships_consumables function
	 *
	 * @return void
	 */
	public function starships_consumables( $data, $cont ) {

		return Starships_Control::starships_consumables( $data, $cont );

	}


	/**
	 * Function to multi request pages of api
	 *
	 * @return void
	 */
	public function multi_request() {
		$data_collection = new Data_Collection();

		if ( empty( URL ) ) {
			return;
		}

		if ( 'planets' === URL ) {
			$array = Planets_Control::pages_planets();

			if ( ! is_array( $array ) || empty( $array ) ) {
				return;
			}

			$cont = 0;
			foreach ( $array as $value ) {
				$cont++;
				$data = $data_collection->data_collection( $value );
				$this->planets_names( $data, $cont );
				$this->planets_terrains( $data, $cont );
				$this->planets_climates( $data, $cont );
				$this->planets_days( $data, $cont );
			}
		} elseif ( 'starships' === URL ) {
			$array = Starships_Control::pages_starships();

			if ( ! is_array( $array ) || empty( $array ) ) {
				return;
			}

			$cont = 0;
			foreach ( $array as $value ) {
				$cont++;
				$data = $data_collection->data_collection( $value );
				$this->starships_names( $data, $cont );
				$this->starships_manufact( $data, $cont );
				$this->starships_consumables( $data, $cont );

			}
		} elseif ( 'characters' === URL ) {
			$array = Characters_Control::pages_characters();

			if ( ! is_array( $array ) || empty( $array ) ) {
				return;
			}

			$cont = 0;
			foreach ( $array as $value ) {
				$cont++;
				$data = $data_collection->data_collection( $value );
				$this->characters_hair( $data, $cont );
				$this->characters_films( $data, $cont );
			}
		}

	}

}

$sw = new Star_Wars();

$sw->multi_request();





