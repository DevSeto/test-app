<?php

/**
 * App Initializing File
 *
 *
 * @package Simple Framework
 * @author  Ahmed Saad <a7mad.sa3d.2014@gmail.com>
 * @license https://creativecommons.org/licenses/by-sa/4.0/legalcode.txt CC-BY-SA-4.0 Creative Commons Attribution Share Alike 4.0
 *
 */

// Define App Directories
defined( 'ROOT' ) ?:  define( 'ROOT', dirname( dirname(__DIR__) ) );

defined( 'DS' ) ?:  define( 'DS', DIRECTORY_SEPARATOR );
defined( 'APP' ) ?:  define( 'APP', ROOT.DS.'App' );
defined( 'LIB' ) ?:  define( 'LIB', APP.DS.'Library' );
defined( 'CONT' ) ?:  define( 'CONT', APP.DS.'Controllers' );
defined( 'MODEL' ) ?:  define( 'MODEL', APP.DS.'Model' );
defined( 'VIEW' ) ?:  define( 'VIEW', APP.DS.'View' );
defined( 'CONF' ) ?:  define( 'CONF', APP.DS.'config' );
defined( 'ASSETS' ) ?:  define( 'ASSETS', ROOT.DS.'assets' );
define('base_url', 'http://test.cm/');
$database = require( CONF . DS . 'db.php' );


// Register Autoloader
function laoderFunc( $class_name ){
	// echo '<br />' . $class_name . '<br />';
	$parts = explode( '\\', $class_name );
	
	array_walk( $parts, function( $v ){
		return ucfirst( $v );
	} );
	
	$path = ROOT . DS . join( $parts, DS ) . '.php';

	if( file_exists( $path ) )
		require( $path );
};

spl_autoload_register( 'laoderFunc' );

// Open Database Connection
App\Library\DatabaseObjectTrait::openConnection();

// Start Session
new App\Library\Session();