<?php

namespace VisualPublinet\StarWars\Controllers;

/**
 * Class of form control
 */
class Form_Control {

	/**
	 * get form option
	 *
	 * @return void
	 */
	public function get_option_form() {

		$option;

		if ( key_exists( 'op', $_POST ) && ! empty( $_POST['op'] ) ) {
			$option = $_POST['op'];
		}

        return $option;

	}
}
