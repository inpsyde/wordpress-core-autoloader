<?php # -*- coding: utf-8 -*-

/**
 * Registers the autoloader.
 *
 * @see WP_Autoload_Controller::register_autoloader
 *
 * @return bool
 */
function wp_register_autoloader() {

	if ( did_action( WP_Autoload_Controller::ACTION ) ) {
		// TODO: Adapt WordPress version.
		_doing_it_wrong( __FUNCTION__, __( 'The autoloader has already been registered.' ), '4.6.0' );

		return false;
	}

	$controller = new WP_Autoload_Controller();

	return $controller->register_autoloader();
}
