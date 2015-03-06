<?php
/**
 * Seach class file.
 *
 * @author David Coombes <webeire@gmail.com>
 */
namespace FoobarSearch;


class Search
{

    public function __construct()
    {
        ;
    }

    public function keyword(array $params)
    {

    	$keyword = $params['keyword'];
        (@$params['page']) ?
    	   $page = $params['page'] :
           $page = 1;
    	$config = \FoobarSearch\Config::factory();

    	$res = \FoobarSearch\API::factory($config)
    		->get(array(
	            'search',
	            'keywords',
	            $keyword,
	            $page
        ));

    	return $res;
    }
}