<?php
/*
 * Blog Controller 
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 18th, 2015
 */

use Mist\Core\Controller\Controller;

class BlogController extends Controller
{

    /**
     * Index action
     * Show all blog posts
     */
    public function index()
    {
        $blog = new Blog();
        $params = array(
            'blogs' => $blog->findAll()
        );
        $this->setParams('params', $params);
        $this->render();
    }
    /*
     * View specific post
     */
    public function view($query)
    {
        $blog = new Blog();
        $params = array(
            'blog' => $blog->find($query[0])
        );
        $this->setParams('params', $params);
        $this->render();
    }
}
