<?php # -*- coding: utf-8 -*-

interface WP_Autoload_FileLoader {

	/**
	 * @param string $file
	 *
	 * @return bool
	 */
	public function load_file( $file );
}
