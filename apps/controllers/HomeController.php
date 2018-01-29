<?php

class HomeController extends BaseController{

    function index(){
        $this->f3->set('view','pages/home.html');
    }
}