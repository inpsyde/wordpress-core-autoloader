<?php # -*- coding: utf-8 -*-

class WP_Autoload_Psr4Rule implements WP_Autoload_Rule {

	/**
	 * @var string
	 */
	private $base_namespace;

	/**
	 * @var string
	 */
	private $base_directory;

	/**
	 * @var WP_Autoload_FileLoader
	 */
	private $file_loader;
	
	/**
	 * @param $base_namespace
	 * @param $base_directory
	 */
	public function __construct( $base_namespace, $base_directory, $file_loader = NULL ) {
	
		$this->base_directory = (string) $base_directory;
		$this->base_namespace = (string) $base_namespace;
		$this->file_loader    = $file_loader && is_a( $file_loader, 'WP_Autoload_Fileloader' )
			? $file_loader
			: new WP_Autoload_IsReadableFileLoader;
	}

	/**
	 * @param string $class (A full qualified class name)
	 *
	 * @return bool
	 */
	public function load_class( $class ) {
		
		// performing the psr4 mapping here to get a $file
		$file = '/whatever';
		
		return $this->file_loader->load_file( $file );
	}

}
