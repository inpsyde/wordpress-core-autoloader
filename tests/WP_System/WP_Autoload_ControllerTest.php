<?php # -*- coding: utf-8 -*-

class WP_Autoload_ControllerTest extends WP_UnitTestCase {

	public function test_register_autoloader() {

		/**
		 * @todo PHP 5.2. compatible syntax?
		 */
		$test_case = $this;
		add_action(
			WP_Autoload_Controller::ACTION, 
			function( $autoloader ) use ( $test_case ) {
				$test_case->assertInstanceOf( 'WP_Autoload_Autoload', $autoloader );
			}
		);
		$testee = new WP_Autoload_Controller;
		
		$this->assertTrue( $testee->register_autoloader() );
		$this->assertSame( 1, did_action( WP_Autoload_Controller::ACTION ) );
	}
	
	public function test_get_autoloader() {

		$testee = new WP_Autoload_Controller;
		$testee->register_autoloader();

		$this->assertInstanceOf(
			'WP_Autoload_Autoload',
			$testee->get_autoloader()
		);
	}

	public function test_get_autoloader_before_registration() {

		$this->markTestIncomplete();
		/**
		 * @todo Find out how $this->expected_doing_it_wrong should be used
		 */
		$testee = new WP_Autoload_Controller;
		$this->expected_doing_it_wrong[] = array();
		$testee->get_autoloader();
	}
}
