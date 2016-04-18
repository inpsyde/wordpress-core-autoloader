<?php # -*- coding: utf-8 -*-

/**
 * Core WordPress autoloader that can be used for spl_autoload_register().
 */
class WP_Autoload_SplAutoload implements WP_Autoload_Autoload {

	/**
	 * @var WP_Autoload_Rule[]
	 */
	private $rules = array();

	/**
	 * Adds the given autoload rule to the autoloader.
	 *
	 * @param WP_Autoload_Rule $rule The autoload rule object.
	 *
	 * @return bool
	 */
	public function add_rule( WP_Autoload_Rule $rule ) {

		if ( in_array( $rule, $this->rules, true ) ) {
			return false;
		}

		$this->rules[] = $rule;

		return true;
	}

	/**
	 * Registers the autoloader.
	 *
	 * @return bool
	 */
	public function register() {

		if ( ! function_exists( 'spl_autoload_register' ) ) {
			return false;
		}

		return spl_autoload_register( array( $this, 'load' ) );
	}

	/**
	 * Loads the according file for the given fully qualified name of a class, interface or trait.
	 *
	 * @param string $fqn The fully qualified name of a class, interface or trait.
	 *
	 * @return bool
	 */
	public function load( $fqn ) {

		foreach ( $this->rules as $rule ) {
			if ( $rule->load( $fqn ) ) {
				return true;
			}
		}

		return false;
	}
}
