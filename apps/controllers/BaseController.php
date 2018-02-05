<?php

class BaseController {

    protected $f3;
    protected $db; 
    protected $logger;

    function __construct() {
        $f3 = Base::instance();
        $dbh = new DB\SQL($f3->get('db_dns') . $f3->get('db_name'), $f3->get('db_user'), $f3->get('db_pass'));       
        $this->f3 = $f3;
        $this->db = $dbh;       
        $this->logger = new Log('app.log');
    }

    function afterroute() {

        //default data for header and sidebar
        $page = new Page($this->db);
        $post = new Post($this->db);
        $category = new Category($this->db);
        $tag = new Tag($this->db);        
        $this->f3->set('pages',$page->find());
        $this->f3->set('latest', $post->find(array(),array('order'=>'id DESC','limit'=>10)));
        $this->f3->set('categories', $category->find());
        $this->f3->set('tags',$tag->find());
        $this->f3->set('sidebar','sidebar.html');

        echo Template::instance()->render('layout.html');
        $this->f3->clear('SESSION.flash');
    }

}
