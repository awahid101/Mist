<?php

namespace Mist\Helpers;

/*
 * Configurations - application environment configurations
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 0.1
 * @date June 15th, 2015
 */

class Configurations
{

    private static $conf;

    private function __construct() 
    {
    }

    private function __clone() 
    {
    }

    public static function init($conf) 
    {
        if (is_readable($conf)) {
            include_once $conf;
        } else {
            die('config.php not found in config/config.php at ' . $conf);
        }

        //change the php error reporting according to coding environment
        if (isset($config['app']['env'])) {
            switch ($config['app']['env']) {
            case 'dev':
                error_reporting(E_ALL);
                break;
            case 'prod':
                error_reporting(0);
                break;
            case 'test':
                error_reporting(0);
                break;
            default:
                exit('Please specify the application environment in config.php.');
            }
        }
        
        //perform configuration specific actions
        if(isset($config['app']['timezone'])) {
            date_default_timezone_set($config['app']['timezone']); 
        }
        else {
            date_default_timezone_set('Pacific/Auckland'); 
        }
        
        self::$conf = $config;
    }

    public static function setConf($index, $value) 
    {
        self::$conf[$index] = $value;
    }

    public static function getConf($index) 
    {
        if (is_null(self::$conf)) {
            new self();
        }
        if (!isset(self::$conf[$index])) {
            return false;
        }
        return self::$conf[$index];
    }
}