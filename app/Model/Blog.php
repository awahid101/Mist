<?php

use Mist\Core\Model\Model;

/*
 * Blog Model
 *
 * @title Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 18th, 2015
 */

class Blog extends Model
{

    /**
     *
     * @var int id
     */
    public $id;
    
    /**
     *
     * @var string title
     */
    public $title;
    /**
     *
     * @var string content
     */
    public $content;

    /**
     * constructor
     */
    public function __construct() 
    {
        parent::__construct('Blog');
    }

}
