<?php # -*- coding: utf-8 -*-

class WP_Autoload_IsReadableFileLoader implements WP_Autoload_FileLoader {

	/**
	 * @param string $file
	 *
	 * @return bool
	 */
	public function load_file( $file ) {

		if ( ! is_readable( $file ) )
			return FALSE;

		require_once $file;

		return TRUE;
	}

}
