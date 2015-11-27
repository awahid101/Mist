<?php

/*
 * Configurations - application environment configurations
 *
 * Implements the singleton pattern
 * 
 * @author Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 15th, 2015
 */
namespace Mist\Helpers;

class Configurations {

    /**
     * conf
     * 
     * @access private
     * @static
     * @var mixed  
     */
    private static $conf;

    /**
     * constructor
     */
    private function __construct() {
        
    }

    /**
     * clone
     */
    private function __clone() {
        
    }

    /**
     * init
     * 
     * initialize the configuration from config file
     * 
     * @param string $conf file path for configuration file
     * @return void
     */
    public static function init($conf) {
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
        if (isset($config['app']['timezone'])) {
            date_default_timezone_set($config['app']['timezone']);
        } else {
            date_default_timezone_set('Pacific/Auckland');
        }

        self::$conf = $config;
    }

    /**
     * setConf
     * 
     * Set a new configuration parameter
     * @param string $index
     * @param mixed $value
     * @return void
     */
    public static function setConf($index, $value) {
        self::$conf[$index] = $value;
    }

    /**
     * getConf
     * 
     * get a value of specific configuration
     * 
     * @param string $index 
     * @return boolean
     */
    public static function getConf($index) {
        if (is_null(self::$conf)) {
            new self();
        }
        if (!isset(self::$conf[$index])) {
            return false;
        }
        return self::$conf[$index];
    }

}
