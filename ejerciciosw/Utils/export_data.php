<?php

namespace VisualPublinet\StarWars\Utils;

/**
 * Export data
 */
class Export_Data {
	/**
	 * Write and export json file
	 *
	 * @param [type] $data
	 * @return void
	 */
	public static function export_json( $data, $file ) {

		$json = '';

		if ( is_array( $data ) && ! empty( $data ) ) {
			$json = json_encode( $data );
		}

		if ( is_string( $file ) && ! empty( $file ) ) {
			file_put_contents( $file, $json );
		}

	}
}
