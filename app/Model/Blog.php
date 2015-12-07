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

    // we define 3 attributes
    // they are public so that we can access them using $post->title directly
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
    public $content;

    public function __construct() 
    {
        parent::__construct('Blog');
    }

}
