<?php # -*- coding: utf-8 -*-

interface WP_Autoload_Autoload {

	/**
	 * @param WP_Autoload_Rule $autoload_rule
	 *
	 * @return void
	 */
	public function add_rule( $autoload_rule );
}
