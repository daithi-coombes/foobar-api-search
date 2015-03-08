<?php
namespace FoobarSearch;

use FoobarSearch;

define( 'FOOBAR_DEBUG', true );
define( 'FOOBAR_DIR', dirname(__FILE__) );

if (defined('FOOBAR_DEBUG'))
{
    error_reporting( E_ALL );
    ini_set('display_errors', 'on');
}

//autoloading vendor
if (!file_exists( FOOBAR_DIR . '/vendor/autoload.php'))
    die ('Please install with `composer install`');
require ('vendor/autoload.php');

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


//load config
global $foobar_config;
$foobar_config = Config::factory()
    ->get();

define("FOOBAR_BASE_URL", $foobar_config['baseURL']);

//build route
global $foobar_route;
$foobar_route = (object) array(
    'module' => 'index',
    'action' => 'index'
);
if (isset($_GET['module'])) {
    $foobar_route->module = $_GET['module'];
}
if (isset($_GET['action'])) {
    $foobar_route->action = $_GET['action'];
}
