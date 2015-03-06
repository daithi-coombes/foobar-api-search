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


//render html
$html = View::factory()
	->render();

echo $html;