<?php # -*- coding: utf-8 -*-

class WP_Autoload_SplAutoload implements WP_Autoload_Autoload {

	/**
	 * @var WP_Autoload_Rule[]
	 */
	private $rules = array();

	/**
	 * @param WP_Autoload_Rule $autoload_rule
	 *
	 * @return void
	 */
	public function add_rule( $autoload_rule ) {

		if ( ! in_array( $autoload_rule, $this->rules, TRUE ) )
			$this->rules[] = $autoload_rule;
	}

	/**
	 * @param string $fqcn (full qualified class name)
	 */
	public function load_class( $fqcn ) {

		foreach ( $this->rules as $rule ) {
			if ( $rule->load_class( $fqcn ) )
				break;
		}
	}
}
