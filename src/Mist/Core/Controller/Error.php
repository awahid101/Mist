<?php
/**
 * Error Controller
 * 
 * All application controller must extent this class.
 *
 * @link          https://github.com/awahid101/Mist
 * @package       Mist.Core.Controller
 * @author Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 15th, 2015
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Mist\Core\Controller;

class Error extends Controller
{
    /**
     * default 404 page
     */
    public function __construct() 
    {
        parent::__construct('Error', 'index');
    }
    /**
     * index
     * default index function throws a 404 error
     * @param mix array $data 
     * @return void
     */
    public function index($data = array())
    {
        if (!isset($data['error'])) {
            $data['error'] = 'Error: 404 Not Found';
        }
        
        //set default error view.
        $this->setView('Error/404');
        $data['page_title']= '404 Not Found';   
        //we might send some error message
        $this->setParams('params', $data);    
        //render the error view
        $this->render();
    }
}
