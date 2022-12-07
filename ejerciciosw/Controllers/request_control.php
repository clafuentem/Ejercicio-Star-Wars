<?php

namespace VisualPublinet\StarWars\Controllers;

use VisualPublinet\StarWars\Controllers\Characters_Control;
use VisualPublinet\StarWars\Controllers\Planets_Control;
use VisualPublinet\StarWars\Controllers\Starships_Control;
use VisualPublinet\StarWars\Utils\Data_Collection;
use VisualPublinet\StarWars\Controllers\Form_Control;

/**
 * Request control
 */
class Request_Controll {

	/**
	 * Function to multi request pages of api
	 *
	 * @return void
	 */
	public function multi_request() {
		$option          = Form_Control::get_option_form();
		$data_collection = new Data_Collection();
		$data            = array();

		if ( empty( $option ) ) {
			return;
		}

		switch ( $option ) {
			case 'planets':
				$array = Planets_Control::pages_planets();

				if ( ! is_array( $array ) || empty( $array ) ) {
					return;
				}

				foreach ( $array as $value ) {
					$data[] = $data_collection->data_collection( $value );
				}

				Planets_Control::planets_names( $data );
				Planets_Control::planets_terrains( $data );
				Planets_Control::planets_climates( $data );
				Planets_Control::planets_days( $data );

				break;

			case 'starships':
				$array = Starships_Control::pages_starships();

				if ( ! is_array( $array ) || empty( $array ) ) {
					return;
				}

				foreach ( $array as $value ) {
					$data[] = $data_collection->data_collection( $value );
				}

				Starships_Control::starships_names( $data );
				Starships_Control::starships_manufact( $data );
				Starships_Control::starships_consumables( $data );

				break;

			case 'characters':
				$array = Characters_Control::pages_characters();

				if ( ! is_array( $array ) || empty( $array ) ) {
					return;
				}

				foreach ( $array as $value ) {
					$data[] = $data_collection->data_collection( $value );
				}

				Characters_Control::characters_hair( $data );
				Characters_Control::characters_films( $data );

				break;

		}

	}
}
