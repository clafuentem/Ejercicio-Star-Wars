<?php

namespace VisualPublinet\StarWars\Utils;

/**
 * Undocumented class
 */
class Export_Data {
	/**
	 * Undocumented function
	 *
	 * @param [type] $data
	 * @return void
	 */
	public static function export_json( $data, $file ) {

		if ( is_array( $data ) && ! empty( $data ) ) {
			$json = json_encode( $data );
		}

		if ( is_string( $file ) && ! empty( $file ) ) {
			file_put_contents( $file, $json );
		}

	}
}
