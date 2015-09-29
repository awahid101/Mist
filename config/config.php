<?php
/*
 * config - main configuration for the application
 *  * 
 * @author Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 15, 2015
 */

//change the parameters accordingly 
//inspired from yiiframework
$config['app'] = array(
    'name' => 'Mist',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..\\',
    'timezone' => 'Pacific/Auckland', //default
    'layout' => 'default',
    'env' => 'dev' //prod, test
    );
    
//routing
$config['route'] = array(
    'defaultController' => 'Welcome',
    'defaultAction' => 'index',
    'defaultTemplate' => 'default',
    );

//database parametrs
$config['db'] = array(
    'type'   => 'mysql', //sqlite etc
    'host'     => 'localhost',
    'port'     => '3306',
    'user'     => 'root',
    'pass' => '',
    'name'     => 'db_mist', //default
    'charset' => 'utf8',
    'tablePrefix' => '',
    );

//session
$config['session'] = array(
    'sessionPrefix' => 'mist_',
    'timeout' => 0, //infinite
    );

//other parameters
$config['params']['adminEmail'] = 'awahid@gmail.com';
$config['params']['supportEmail'] = 'awahid@gmail.com';
