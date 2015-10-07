<?php

namespace Mist\Core\Controller;

/*
 * Controller - Application controller
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 15th, 2015
 */

class Error extends Controller
{
    /**
     * default 404 page
     */
    public function __construct() 
    {
        parent::__construct('Error', 'index');
    }
    /**
     * default index function throws a 404 error
     * @param mix array $data 
     * @return void
     */
    public function index($data = array())
    {
        if (!isset($data['error'])) {
            $data['error'] = 'Error: 404 Not Found';
        }
        
        //set default error view
        $this->setView('Error/404');
        $data['page_title']= '404 Not Found';        
        $this->setParams('params', $data);    
        $this->render();
    }
}
