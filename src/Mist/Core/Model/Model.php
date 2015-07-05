<?php

namespace Mist\Core\Model;

use Mist\Helpers\Database;
use Mist\Helpers\Configurations;

/*
 * Model - Application base Model class
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 0.1
 * @date June 18th, 2015
 */

abstract class Model
{

    protected $db;
    protected $tableName;
    protected $modelName;

    /**
     * create a new instance of the database helper
     */

    public function __construct($tableName) 
    {
        //connect to PDO here.
        $this->db = Database::getInstance();
        $this->tableName = strtolower(Configurations::getConf("db")["tablePrefix"] . $tableName);
        $this->modelName = $tableName;
    }

    /**
     * 
     */

    public function findAll() 
    {
        $stmt = $this->db->prepare('SELECT * FROM `' . $this->tableName . '`');
        $stmt->setFetchMode(Database::FETCH_CLASS | Database::FETCH_PROPS_LATE, $this->modelName);
        $stmt->execute();
        return $stmt->fetchAll(Database::FETCH_CLASS | Database::FETCH_PROPS_LATE, $this->modelName);
    }

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
