<?php # -*- coding: utf-8 -*-

/**
 * @see WP_Autoload_Psr4Rule
 */
class WP_Autoload_Psr4RuleTest extends MonkeryTestCase\TestCase {

	/**
	 * @dataProvider load_class_test_data
	 *
	 * @param $namespace
	 * @param $directory
	 * @param $fqn
	 * @param $file
	 */
	public function test_load( $namespace, $directory, $fqn, $file ) {

		$file_loader_mock = Mockery::mock( 'WP_Autoload_FileLoader' );
		$file_loader_mock
			->shouldReceive( 'load_file' )
			->once()
			->with( $file )
			->andReturn( true );
		$testee = new WP_Autoload_Psr4Rule( $namespace, $directory, $file_loader_mock );

		$this->assertTrue( $testee->load( $fqn ) );
	}

	/**
	 * @see test_load_class
	 */
	public function load_class_test_data() {

		$data = array();

		$data[ 'case_1' ] = array(
			'Foo\\Bar\\',                       // $namespace
			'/vendor/foo.bar/src',              // $directory
			'Foo\\Bar\\ClassName',              // $fqn
			'/vendor/foo.bar/src/ClassName.php' // $file
		);

		$data[ 'case_2' ] = array(
			'Foo\Bar',
			'/vendor/foo.bar/src',
			'Foo\Bar\DoomClassName',
			'/vendor/foo.bar/src/DoomClassName.php'
		);

		$data[ 'case_3' ] = array(
			'Foo\Bar',
			'/vendor/foo.bar/tests',
			'Foo\Bar\ClassNameTest',
			'/vendor/foo.bar/tests/ClassNameTest.php'
		);

		$data[ 'case_4' ] = array(
			'Foo\Bar\Baz\Dib\Zim\Gir',
			'/vendor/foo.bar.baz.dib.zim.gir/src',
			'Foo\Bar\Baz\Dib\Zim\Gir\ClassName',
			'/vendor/foo.bar.baz.dib.zim.gir/src/ClassName.php'
		);

		return $data;
	}

	/**
	 * @dataProvider load_no_matching_class_test_data
	 *
	 * @param $namespace
	 * @param $directory
	 * @param $fqn
	 */
	public function test_load_no_matching_class( $namespace, $directory, $fqn ) {

		$file_loader_mock = Mockery::mock( 'WP_Autoload_FileLoader' );
		$file_loader_mock
			->shouldNotReceive( 'load_file' );

		$testee = new WP_Autoload_Psr4Rule( $namespace, $directory, $file_loader_mock );
		$this->assertFalse( $testee->load( $fqn ) );
	}

	/**
	 * @see test_load_no_matching_class
	 */
	public function load_no_matching_class_test_data() {

		$data = array();

		$data[ 'case_1' ] = array(
			'Foo\\Bar\\Class\\',    // $namespace
			'/vendor/foo.bar/src',  // $directory
			'Foo\\Bar\\ClassName'   // $fqn
		);

		$data[ 'case_2' ] = array(
			'WordPress\Autoload',
			'/wp-includes/autoload',
			'Autoload'
		);

		return $data;
	}
}
