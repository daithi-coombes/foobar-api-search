<?php
namespace FoobarSearch;
use FoobarSearch;

/**
 * Sample sprite/task for senior dev position.
 * 
 * This is a sample task to show coding methodologies. PEAR coding standard is
 * to be used.
 * 
 * @author David Coombes <webeire@gmail.com>
 */


//bootstrap
require_once( 'bootstrap.php' );
//end bootstrap


//parse module
if ($foobar_route!='index') {

    $class = '\FoobarSearch\\'.$foobar_route;
    $method = $_GET['action'];
    $controller = new $class();
    (@$_GET['data']) ?
        $data = $_GET['data'] :
        $data = null;

    $html = $controller->$method($data);
}

//default
else {
    $html = View::factory()
        ->render();
}

echo $html;