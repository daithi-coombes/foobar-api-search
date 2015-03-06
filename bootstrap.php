<?php
namespace FoobarSearch;

use FoobarSearch;

define( 'FOOBAR_DEBUG', true );
define( 'FOOBAR_DIR', dirname(__FILE__) );

if( defined( 'FOOBAR_DEBUG' ) )
{
    error_reporting( E_ALL );
    ini_set( 'display_errors', 'on' );
}

//autoloading vendor
if( !file_exists( FOOBAR_DIR . '/vendor/autoload.php' ) )
    die( 'Please install with `composer install`' );
require( 'vendor/autoload.php' );

//autoload library
spl_autoload_register( function($classname){

	//remove root namespace
	$parts = explode( "\\", $classname );
	array_shift( $parts );

	//load class
    $file = FOOBAR_DIR . '/lib/' . implode( "/", $parts) . '.php';
    if( file_exists($file) )
    	include_once $file;
} );


global $foobar_config;
$foobar_config = Config::factory()
    ->get();

