<?php # -*- coding: utf-8 -*-

/**
 * Core WordPress autoload file loader that checks for readability only.
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

		$this->autoloader = new WP_Autoload_SplAutoload();

		add_filter( 'wp_autoloader', array( $this, 'get_autoloader' ) );

		if ( ! spl_autoload_register( array( $this->autoloader, 'load_file' ) ) ) {
			return false;
		}

		/**
		 * Fires right after the autoloader has been registered.
		 *
		 * @param WP_Autoload_Autoload $autoloader The autolodaer object.
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
