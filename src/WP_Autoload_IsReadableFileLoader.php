<?php # -*- coding: utf-8 -*-

/**
 * Core WordPress autoload file loader that checks for readability only.
 */
class WP_Autoload_IsReadableFileLoader implements WP_Autoload_FileLoader {

	/**
	 * Loads the given file.
	 *
	 * @param string $file The file path.
	 *
	 * @return bool
	 */
	public function load_file( $file ) {

		if ( ! is_readable( $file ) ) {
			return false;
		}

		require_once $file;

		return true;
	}
}
