<?php

namespace Mist\Core\Model;

use Mist\Helpers\Database;
use Mist\Helpers\Configurations;

/*
 * Model - Application base Model class
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 18th, 2015
 */

abstract class Model
{

    protected $db;
    protected $tableName;
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

}
