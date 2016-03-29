<?php # -*- coding: utf-8 -*-

/**
 * Triggers the action 'wp_autoload'
 */
function wp_setup_autoloader() {

	$autoloader = new WP_Autoload_SplAutoload;
	spl_autoload_register( array( $autoloader, 'load_class' ) );

	/**
	 * Use the WordPress core autoloader to
	 * bootstrap your plugin and theme
	 *
	 * @param WP_Autoload_Autoload $autoloader
	 */
	do_action( 'wp_autoload', $autoloader );
}
