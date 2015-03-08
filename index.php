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
if ($foobar_route->module!='index') {

    //construct controller
    $class = '\FoobarSearch\\'.$foobar_route->module;
    $method = $foobar_route->action;
    $controller = new $class();

    //call action method
    (isset($_GET['data'])) ?
    	$data = $_GET['data'] :
    	$data = null;
    $result = $controller->$method($data);

    //render view
    $html = View::factory()
        ->setData($result)
    	->render($foobar_route);
}

//default
else {
    $html = View::factory()
        ->render($foobar_route);
}

//print view
echo $html;
