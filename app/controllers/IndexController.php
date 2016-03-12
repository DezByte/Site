<?php

namespace SiteDezz\Controller;

use Dez\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction()
    {
        $this->response->setContent([
            'argv' => func_get_args()
        ]);
    }

    public function helloAction()
    {
        $this->response->setContent([time()]);
    }

}