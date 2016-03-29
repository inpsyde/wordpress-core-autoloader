<?php # -*- coding: utf-8 -*-

/**
 * Interface for all core WordPress-compatible autoload file loader implementations.
 */
interface WP_Autoload_FileLoader {

	/**
	 * Loads the given file.
	 *
	 * @param string $file The file path.
	 *
	 * @return bool
	 */
	public function load_file( $file );
}
