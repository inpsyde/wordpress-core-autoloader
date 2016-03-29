<?php # -*- coding: utf-8 -*-

interface WP_Autoload_Rule {

	/**
	 * @param string $class (A full qualified class name)
	 *
	 * @return bool
	 */
	public function load_class( $class );
}
