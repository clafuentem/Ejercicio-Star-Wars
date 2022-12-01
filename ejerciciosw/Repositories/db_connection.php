<?php

/**
 * Open Connection to the DB
 *
 * @return void
 */
function open_connection() {

	$mysqli = new mysqli( 'localhost', 'root', 'root', 'star_wars' );

	if ( $mysqli->connect_error ) {
		echo '<p>Parece que ha habido un error inesperado con la conexión a la base de datos.</p>';
		die();
	}
	return $mysqli;
}

/**
 * Close connection to the DB
 *
 * @param [type] $mysqli
 * @return void
 */
function close_connection( $mysqli ) {
	$mysqli->close();
}


