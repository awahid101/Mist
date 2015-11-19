<?php

/**
 * View Class
 * 
 * Renders view
 *
 * @link          https://github.com/awahid101/Mist
 * @package       Mist.Core.Controller
 * @author Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 15th, 2015
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Mist\Core\Template;

use Mist\Helpers\Configurations;

/*
 * View - load templates
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 15, 2015
 */

class View {

    /**
     *
     * @var mix holds the parameters set by controller
     */
    protected $params = array();
    
    /**
     *
     * @var type string holds the controller name
     */
    protected $controller;
    
    /**
     *
     * @var type string holds the action name
     */
    protected $action;
    
    /**
     *
     * @var type string holds the layout name
     */
    protected $layout;

    /**
     * Constructor
     * 
     * @param string $controller name of the controller
     * @param string $action name of the action
     */
    function __construct($controller, $action) {
        $this->controller = lcfirst($controller);
        $this->action = lcfirst($action);
        $this->setLayout(Configurations::getConf("app")["layout"]);
    }

    /**
     * set the layout for this request/view
     * @param string $layoutName 
     */
    public function setLayout($layoutName) {
        $this->layout = strtolower($layoutName);
    }

    /**
     * 
     * change the controller view
     * 
     * @param string $viewName name of the view to render
     */

    public function setView($viewName) {
        $segmants = explode("/", $viewName);
        if (count($segmants) == 2) {
            $this->controller = lcfirst($segmants[0]);
            $this->action = lcfirst($segmants[1]);
        } else {
            $this->action = $viewName; //might or might not be invalid view.
        }
    }

    /*
     *  set the Parameters that are accessible in view
     * @param string $name 
     * @value string $value
     */

    function set($name, $value) {
        $this->params[$name] = $value;
    }
    
    /**
     * renders the view - parses the HTML
     */
    function render() {
        //extracts all the parameters
        extract($this->params);

        $basePath = Configurations::getConf("app")["basePath"];
        $path = "templates/views/" . $this->controller . "/" . $this->action . ".php";
        $content = '';

        //overide global view file if a local view is present in app/templates
        if (file_exists($basePath . "app/" . $path)) {
            $content = $this->renderContent($basePath . "app/" . $path, $params);
        } else if (file_exists($basePath . $path)) {

            $content = $this->renderContent($basePath . $path, $params);
        } else {
            $content = 'Error: View not found: ' . $path;
        }

        //set the page title parameter
        if (!isset($params["page_title"])) {
            $params["page_title"] = Configurations::getConf("app")["name"];
        }

        $path = "templates/layouts/" . $this->layout . ".php";

        if (file_exists($basePath . "app/" . $path)) {
            include $basePath . "app/" . $path;
        } else if (file_exists($basePath . $path)) {
            include $basePath . $path;
        } else {
            die('Error: Cannot find the Layout: ' . $path);
        }
    }

    /**
     * renders the content with given parameters
     * 
     * @param string $path complete path of the php file to render
     * @param array $params 
     * @return void
     */
    public function renderContent($path, $params) {
        $content = '';
        
        //buffer output
        ob_start();
        include $path;
        $content = ob_get_contents();
        ob_end_clean();
        //content holds the parsed variables and html
        return $content;
    }

}
