<?php # -*- coding: utf-8 -*-

class WP_Autoload_Psr4RuleTest extends MonkeryTestCase\TestCase {

	public function test_load_class() {
		
		$file_loader_mock = Mockery::mock( 'WP_Autoload_FileLoader' );
		$testee = new WP_Autoload_Psr4Rule( '', '', $file_loader_mock );
		
		$this->markTestSkipped( 'Under construction' );
	}
	
}
