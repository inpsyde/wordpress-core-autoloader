<?php # -*- coding: utf-8 -*-

$base_dir = dirname(        // root
	dirname(                //tests/
		dirname( __FILE__ ) // WP_System/
	)
);

$autoload = $base_dir . '/vendor/autoload.php';
$wp_root  = $base_dir . '/vendor/inpsyde/wordpress-dev';
if ( file_exists( $autoload ) )
	require_once $autoload;

$starter = new WpTestsStarter\WpTestsStarter( $wp_root );
$starter->defineDbUser( WP_AUTOLOAD_DB_USER );
$starter->defineDbName( WP_AUTOLOAD_DB_NAME );
$starter->defineDbPassword( WP_AUTOLOAD_DB_PASSWORD );
$starter->defineDbHost( WP_AUTOLOAD_DB_HOST );
$starter->defineDbCharset( WP_AUTOLOAD_DB_CHARSET );
$starter->defineDbCollate( WP_AUTOLOAD_DB_COLLATE );
$starter->setTablePrefix( WP_AUTOLOAD_DB_TABLE_PREFIX );

$starter->bootstrap();
