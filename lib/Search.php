<?php
/**
 * Seach class file.
 *
 * @author David Coombes <webeire@gmail.com>
 */
namespace FoobarSearch;


/**
 * Search class
 */
class Search
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        ;
    }

    /**
     * Make a keyword search.
     * 
     * @param array $param Associative array with keyword/page values.
     * @return stdClass
     */
    public function keyword(array $params)
    {

        //setup params
    	$keyword = $params['keyword'];
        (@$params['page']) ?
    	   $page = $params['page'] :
           $page = 1;
    	$config = \FoobarSearch\Config::factory();

        //make api call
    	$res = \FoobarSearch\API::factory($config)
    		->get(array(
	            'search',
	            'keywords',
	            $keyword,
	            $page
        ));

        //parse results
        $results = array();
        $total = $res->body->response->numFound;
        $docs = $res->body->response->docs;
        $page = $res->body->filters->page;

        //extract required data from $docs
        foreach ($docs as $doc) {

            $results[] = array(
                'title'    => $doc->thread_title,
                'forum'    => $doc->forum_title,
                'username' => $doc->username
            );
        }

    	return (object) array(
            'total'      => $total,
            'page_count' => count($docs),
            'results'    => $results,
            'page'       => $page
        );
    }
}