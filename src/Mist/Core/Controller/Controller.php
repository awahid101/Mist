<?php
namespace Mist\Core\Controller;

use Mist\Core\Template\View;

/*
 * Controller - Application controller
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 0.1
 * @date June 15th, 2015
 */

abstract class Controller
{
    protected $controller;
    protected $action;
    protected $view;
            
    function __construct($controller, $action = 'index', $params = array()) 
    {    
        $this->controller = $controller;
        $this->action = $action;        
        $this->view = new View($controller, $action);
        $this->setParams('params', $params);
    }
 
    protected function setParams($name,$value) 
    {
        $this->view->set($name, $value);
    }
     
    protected function setLayout($layoutName) 
    {
        $this->view->setLayout($layoutName);
    }
    
    protected function setView($viewName) 
    {
        $this->view->setView($viewName);
    }
    
    /**
     * Question Time: What if I use desctructor to render the view?
     */
    protected function render() 
    {
            $this->view->render();
    }
}
