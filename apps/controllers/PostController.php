<?php

class PostController extends BaseController
{

    public function index()
    {
        $id = $this->f3->get('PARAMS.id');
        $post = new Post($this->db);
        $content = $post->load(array('id=?',$id));
        $this->f3->set('data', $content);
        $this->f3->set('ESCAPE', FALSE);  
        $this->f3->set('view', 'pages/post.html');
    }
}
