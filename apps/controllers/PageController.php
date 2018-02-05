<?php

class PageController extends BaseController
{

    public function index()
    {
        $id = $this->f3->get('PARAMS.id');
        $page = new Page($this->db);
        $content = $page->load(array('id=?',$id));
        $this->f3->set('data', $content);
        $this->f3->set('ESCAPE', FALSE);  
        $this->f3->set('view', 'pages/page.html');
    }
}
