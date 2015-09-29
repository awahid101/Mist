<?php
/*
 * index.php - invoke the framework
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 15th, 2015
 */

$loader = dirname(__FILE__) . '/../vendor/autoload.php';

if (file_exists($loader)) {
    require $loader;
} else {
    echo "<p>Unable to start the framework </p><br/>";
    echo "<p>Please run the command composer install from your working directory using your command promt</p>";
    echo "<p>For more help about composer, please visit http://getcomposer.org</p>";
    exit;
}

//load configurations
use Mist\Helpers\Configurations;
$confPath = dirname(__FILE__) . '/../config/config.php';
Configurations::init($confPath);
  
//initialize session 
use Mist\Helpers\Session;
Session::init();

//router
use Mist\Core\Routing\Router;
$router = new Router();

//define routes
$url = isset($_GET['url'])?$_GET['url']:'';
$router->route($url);