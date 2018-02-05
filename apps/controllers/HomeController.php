<?php

class HomeController extends BaseController
{

    public function index()
    {
        $post = new Post($this->db);
        $this->f3->set('postings', $post->find(array(), array('order' => 'id DESC', 'offset' => 0, 'limit' => 5)));
        $this->f3->set('view', 'pages/home.html');
    }
}
