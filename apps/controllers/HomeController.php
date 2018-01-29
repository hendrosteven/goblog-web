<?php

class HomeController extends BaseController{

    function index(){
        $offset = $this->f3->get('PARAMS.offset')!= null ? $this->f3->get('PARAM.offset'):0;
        $this->logger->write($this->f3->get('PARAMS.offset'));
        $page = new Page($this->db);
        $post = new Post($this->db);
        $category = new Category($this->db);
        $tag = new Tag($this->db);        
        $this->f3->set('pages',$page->find());
        $this->f3->set('latest', $post->find(array(),array('order'=>'id DESC','limit'=>10)));
        $this->f3->set('postings', $post->find(array(),array('order'=>'id DESC','offset'=>$offset,'limit'=>5)));
        $this->f3->set('categories', $category->find());
        $this->f3->set('tags',$tag->find());
        $this->f3->set('view','pages/home.html');
    }
}