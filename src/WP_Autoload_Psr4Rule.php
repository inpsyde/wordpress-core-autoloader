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

		$this->namespace = trim( (string) $namespace, '\\' ) . '\\';

		$this->directory = str_replace( '\\', '/', (string) $directory );
		$this->directory = trim( $this->directory, '/' ) . '/';

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

		$file_path = substr( $fqn, strlen( $this->namespace ) );
		$file_path = str_replace( '\\', '/', $file_path );

		return $this->file_loader->load_file( "{$this->directory}$file_path.php" );
	}
}
