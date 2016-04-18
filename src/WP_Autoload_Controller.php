<?php # -*- coding: utf-8 -*-

/**
 * WordPress autoload controller that registers the autoloader.
 */
class WP_Autoload_Controller {

	/**
	 * @type string
	 */
	const ACTION = 'wp_register_autoloader';

	/**
	 * @var WP_Autoload_Autoload
	 */
	private $autoloader = null;

	/**
	 * Registers the autoloader.
	 *
	 * @return bool
	 */
	public function register_autoloader() {

		if ( did_action( self::ACTION ) ) {
			return false;
		}

		/**
		 * Filters the autoloader object.
		 *
		 * @param WP_Autoload_Autoload $autoloader The autoloader object.
		 */
		$custom_autoloader = apply_filters( 'wp_custom_autoloader', null );

		$this->autoloader = $custom_autoloader instanceof WP_Autoload_Autoload
			? $custom_autoloader
			: new WP_Autoload_SplAutoload();

		add_filter( 'wp_autoloader', array( $this, 'get_autoloader' ) );

		if ( ! $this->autoloader->register() ) {
			return false;
		}

		/**
		 * Fires right after the autoloader has been registered.
		 *
		 * @param WP_Autoload_Autoload $autoloader The autoloader object.
		 */
		do_action( self::ACTION, $this->autoloader );

		return true;
	}

	/**
	 * Returns the autoloader object.
	 *
	 * @wp-hook wp_autoloader
	 *
	 * @return WP_Autoload_Autoload|null
	 */
	public function get_autoloader() {

		if ( ! did_action( self::ACTION ) ) {
			// TODO: Adapt WordPress version.
			_doing_it_wrong( __METHOD__, __( 'The autoloader has not yet been registered.' ), '4.6.0' );
		}

		return $this->autoloader;
	}
}
