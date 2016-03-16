<?php

namespace SiteDezz\Controller;

use Dez\Mvc\Controller;

class BinController extends Controller {

    public function indexAction()
    {
        $this->redirect('bin/share-new');
    }

    public function shareNewAction()
    {

    }

    public function saveAction()
    {
        if(! $this->request->getPost()) {
            $this->redirect('bin')->sendHeaders();
        }

        die(var_dump($this->request->getPost()));
    }

}