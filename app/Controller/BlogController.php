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
     * View a specific blog post
     * 
     * @param array $query holds paramters given by users
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
    
    /*
     * Create a new blog post
     * 
     * @param array $query holds paramters given by users
     */
    public function create($query)
    {
        $params = array(
            'message' => null
        );
        
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {  
            $blog = new Blog(); 
            $blog->setFields($_POST);
            if($blog->add()){
                $params['message'] = 'Record added successfully';
            }
            else{
                $params['message'] = 'Request was not successfull. Please try again';
                $params['error'] = true;
            }
            
        }
        $this->setParams('params', $params);
        $this->render();
    }
    /**
     * update a new blog post
     */
    public function update($id){
       //get form details
        $blog = new Blog();    
        if(isset($_POST['id'])){
            //update record
            $blog = $blog->findModel($_POST['id']);
            $blog->setFields($_POST);
            if($blog->save()){
                $params['message'] = 'Record updated successfully';
            }
            else{
                $params['message'] = 'Request was not successfull. Please try again';
                $params['error'] = true;
            }
        }
        //
        $this->setParams('params', $params);
        $this->render();
    }
    
    /**
     * delete blog
     * @param type $id
     */
    public function delete($id){
        if($id){
            $blog = $blog->findModel($id);
            if($blog)
                $blog->delete();
        }
     }
    
}

