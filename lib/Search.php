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
    	$page = $params['page'];
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