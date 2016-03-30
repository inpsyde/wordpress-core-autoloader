<?php # -*- coding: utf-8 -*-

/**
 * Interface for all core WordPress-compatible autoload rule implementations.
 */
interface WP_Autoload_Rule {

	/**
	 * Loads the according file for the given fully qualified name of a class, interface or trait.
	 *
	 * @param string $fqn The fully qualified name of a class, interface or trait.
	 *
	 * @return bool
	 */
	public function load( $fqn );
}
