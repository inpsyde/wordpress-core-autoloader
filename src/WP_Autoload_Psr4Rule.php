<?php # -*- coding: utf-8 -*-

/**
 * Core WordPress PSR-4 autoloader.
 */
class WP_Autoload_Psr4Rule implements WP_Autoload_Rule {

	/**
	 * @var string
	 */
	private $directory;

	/**
	 * @var WP_Autoload_FileLoader
	 */
	private $file_loader;

	/**
	 * @var string
	 */
	private $namespace;

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @param string                 $namespace   The namespace.
	 * @param string                 $directory   The directory root.
	 * @param WP_Autoload_FileLoader $file_loader The core WordPress autoload file loader object.
	 */
	public function __construct( $namespace, $directory, WP_Autoload_FileLoader $file_loader ) {

		$this->namespace = trim( (string) $namespace, '\\' );
		// append trailing ns separator to avoid matches of NS:Foo\Bar with FQN:Foo\BarBazz
		$this->namespace .= '\\';

		$this->directory = preg_replace( '~[\\|/]+~', DIRECTORY_SEPARATOR, (string) $directory );
		$this->directory = rtrim( $this->directory, DIRECTORY_SEPARATOR );

		$this->file_loader = $file_loader;
	}

	/**
	 * Loads the according file for the given fully qualified name of a class, interface or trait.
	 *
	 * @param string $fqn The fully qualified name of a class, interface or trait.
	 *
	 * @return bool
	 */
	public function load( $fqn ) {

		$fqn = ltrim( $fqn, '\\' );
		if ( 0 !== strpos( $fqn, $this->namespace ) ) {
			return false;
		}

		$namepart = str_replace( $this->namespace, '', $fqn );
		$namepart = ltrim( $namepart, '\\' );

		$file = $this->directory . DIRECTORY_SEPARATOR . "$namepart.php";
		$file = str_replace( '\\', DIRECTORY_SEPARATOR, $file );

		return $this->file_loader->load_file( $file );
	}
}
