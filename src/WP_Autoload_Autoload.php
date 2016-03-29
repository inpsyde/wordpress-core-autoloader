<?php # -*- coding: utf-8 -*-

/**
 * Interface for all core WordPress-compatible autoloader implementations.
 */
interface WP_Autoload_Autoload extends WP_Autoload_Rule {

	/**
	 * Adds the given autoload rule to the autoloader.
	 *
	 * @param WP_Autoload_Rule $rule The autoload rule object.
	 *
	 * @return bool
	 */
	public function add_rule( WP_Autoload_Rule $rule );
}
