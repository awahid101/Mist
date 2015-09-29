<?php

namespace Mist\Core\Routing;

use Mist\Helpers\Configurations;
use Mist\Core\Controller\Error;

/*
 * Router - call relevent controllers and actions
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 15th, 2015
 */

class Router
{

    private $path;
    private $controller;
    private $action;
/**
 * Constructor
 * 
 * @param string $path
 * @param string $controller
 * @param string $action
 */
    public function __construct($path = 'app', $controller = 'Welcome', $action = 'index')
    {
        $this->path = $path;
        $this->controller = ucfirst($controller);
        $this->action = $action; //case sensitive; should have camelCase
    }

    public function route($url)
    {
        // seperate controller, action and parameters
        $urlSegments = explode("/", $url);

        if (!empty($urlSegments[0]) && strtolower($urlSegments[0]) != 'index') {
            $this->controller = ucfirst($urlSegments[0]);
        }

        if (!empty($urlSegments[1]) && strtolower($urlSegments[1]) != 'index') {
            $this->action = $urlSegments[1];
        }

        $params = count($urlSegments) > 2 ? array_slice($urlSegments, 2) : array();

        $filePath = Configurations::getConf("app")["basePath"] . "/" . $this->path . '/Controller/' . $this->controller . 'Controller.php';

        if (is_readable($filePath)) {
            include $filePath;
            $class = $this->controller."Controller";
            $controller = new $class($this->controller,$this->action);

            if (is_callable(array($controller, $this->action))) {
                $action = $this->action;
                //load its model class
                $modelClass = Configurations::getConf("app")["basePath"] . "/" . $this->path . '/Model/' . ucfirst($this->controller) . '.php';
                if (is_readable($modelClass)) {
                    include_once $modelClass;
                }
            } else {
                $controller = new Error();
                $action = 'index';
                $params['error'] = 'Method not found: <strong>' . $this->controller . "Controller/" . $this->action . '</strong>';
            }
        } else {
            $controller = new Error();
            $action = 'index';
            $params['error'] = 'Invalid request : <strong>' . $this->controller . "Controller/" . $this->action . '</strong>';
        }

        $controller->$action($params);
    }
    
    
    
}
