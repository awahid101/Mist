<?php

use Mist\Core\Controller\Controller;

/*
 * Welcome Controller 
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 0.1
 * @date June 15th, 2015
 */

class WelcomeController extends Controller
{

    /**
     * Define Index action
     * Use default templates and views from config file
     */
    public function index()
    {
        //
        
        $params = array(
            'message' => 'Welcome! I am alive.',
            'time' => date('y M, d H:i:s', time())
        );
        $this->setParams('params', $params);
        $this->render();
    }

    /**
     * Define page title and load template files
     */
    public function about()
    {

        $params = array(
            'message' => 'Place your intro here.',
            'time' => date('y M, d H:i:s', time())
        );
        $this->setParams('params', $params);
        $this->render();
    }

    /**
     * Define site page
     */
    public function contact()
    {
        $this->setView('welcome/index');
        $params = array(
            'time' => date('y M, d H:i:s', time())
           );
        $this->setParams('params', $params);
        $this->render();
    }
}
