<?php

namespace SiteDezz\Controller;

use Dez\Mvc\Controller;
use Dez\Validation\Validation;

class AuthController extends Controller {

    public function indexAction()
    {
        if($this->auth->isUser()) {
            $this->flash->info("Вы уже авторизированы под {$this->auth->getModel()->get('email')}");
            $this->response->redirect($this->url->path('index'))->sendHeaders();
        } else {
            if($this->request->isPost()) {
                $validation = new Validation($this->request->getPost());

                $validation->email('email');
                $validation->password('password');

                if(! $validation->validate()) {
                    foreach($validation->getMessages() as $messages) {
                        foreach($messages as $message) {
                            $this->flash->warning($message->getMessage());
                        }
                    }
                } else {
                    try {
                        $this->auth->authenticate($this->request->getPost('email'), $this->request->getPost('password'));

                        $this->flash->info("Спасибо за авторизацию!");

                        $backLink = $this->request->getQuery('back', false);
                        $link = $backLink ? $backLink : $this->url->path('index');

                        $this->response->redirect($link)->sendHeaders();
                    } catch (\Exception $e) {
                        $this->flash->error($e->getMessage());
                    }
                }
            }
        }
    }

    public function closeSessionAction()
    {
        $this->auth->logout();
        $this->flash->info("Ваша сессия закрыта!");

        $backLink = $this->request->getQuery('back', false);
        $link = $backLink ? $backLink : $this->url->path('index');

        $this->response->redirect($link)->sendHeaders();
    }

}