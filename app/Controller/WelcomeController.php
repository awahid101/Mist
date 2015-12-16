<?php
/*
 * Welcome Controller 
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 15th, 2015
 */

use Mist\Core\Controller\Controller;

/**
 * Sample Welcome Controller for the mist framework
 */

class WelcomeController extends Controller
{

    /**
     * Define Index action
     * Use default templates and views from config file
     */
    public function index()
    {   
        $params = array(
            'message' => 'Welcome! I am alive.',
            'time' => date('d M, Y H:i:s', time())
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
            'time' => date('d M, Y H:i:s', time())
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
