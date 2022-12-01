<?php

namespace VisualPublinet\StarWars\Utils;

require 'url_config.php';

/**
 * Undocumented class
 */
class Data_Collection {

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public static function data_collection( $link ) {

		if ( ! empty( $link ) && is_string( $link ) ) {
			$url = $link;
		}

		$url = curl_init( $url );
		curl_setopt( $url, CURLOPT_RETURNTRANSFER, true );

		curl_setopt( $url, CURLOPT_SSL_VERIFYHOST, false );
		$content = curl_exec( $url );

		curl_close( $url );

		$result = json_decode( $content, true );

		return $result;
	}

}
