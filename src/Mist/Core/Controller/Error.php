<?php

namespace Mist\Core\Controller;

/*
 * Controller - Application controller
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 0.1
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
    
    public function index($data = array())
    {
        if (!isset($data['error'])) {
            $data['error'] = 'Error: 404 Not Found';
        }
        $this->setView('Error/404');
        $data['page_title']= '404 Not Found';        
        $this->setParams('params', $data);    
        $this->render();
    }
}
