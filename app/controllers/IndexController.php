<?php

namespace SiteDezz\Controller;

use Dez\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction($id)
    {

    }

    public function helloAction()
    {
        $this->response->setContent([1]);
    }

}