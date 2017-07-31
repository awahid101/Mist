<?php
/**
 * 
 * Model - Application base Model class
 *
 * @link          https://github.com/awahid101/Mist
 * @package       Mist.Core.Controller
 * @author Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 15th, 2015
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Mist\Core\Model;

use Mist\Helpers\Database;
use Mist\Helpers\Configurations;

abstract class Model
{
    /**
     *
     * @var database object 
     */
    protected $db;
    
    /**
     *
     * @var string holds the name of the table
     */
    protected $tableName;
    
    /**
     *
     * @var string holds the name of the model class for the table
     */
    protected $modelName;

    /**
     * Constructor
     * create a new instance of the database helper
     * @param string $tableName stores a table name
     * @return void 
     */

    public function __construct($tableName) 
    {
        //connect to PDO here.
        $this->db = Database::getInstance();
        $this->tableName = strtolower(Configurations::getConf("db")["tablePrefix"] . $tableName);
        $this->modelName = $tableName;
    }

    /**
     * findAll
     * select all records from the table 
     * @return object returns the fetched results in form of object
     */

    public function findAll() 
    {
        $stmt = $this->db->prepare('SELECT * FROM `' . $this->tableName . '`');
        $stmt->setFetchMode(Database::FETCH_CLASS | Database::FETCH_PROPS_LATE, $this->modelName);
        $stmt->execute();
        return $stmt->fetchAll(Database::FETCH_CLASS | Database::FETCH_PROPS_LATE, $this->modelName);
    }

    /**
     * find
     * returns a record by matching id.
     * @param int $id
     * @return object returns table records from the database
     */
    public function find($id) 
    {

        // we make sure $id is an integer
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $stmt = $this->db->prepare('SELECT * FROM `' . $this->tableName . '` WHERE id = :id');
        $stmt->setFetchMode(Database::FETCH_CLASS | Database::FETCH_PROPS_LATE, $this->modelName);
        // the query was prepared, now we replace :id with our actual $id value
        $stmt->execute(array('id' => $id));
        return $stmt->fetch();
    }
     
    /**
     * 
     * @param type $attributes
     */
    public function setFields($attributes){
        if(isset($attributes)){
            
        }
    }
}
