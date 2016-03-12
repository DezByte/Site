<?php

namespace SiteDezz\Controller\JsonApi;

use Dez\Auth\AuthException;
use Dez\Http\Response;
use Dez\Mvc\Controller;
use Dez\Validation\Validation;

class AuthController extends AbstractJsonApiController {

    public function statusAction()
    {
        $this->success([
            'is_guest' => $this->auth->isGuest(),
            'user' => $this->auth->getModel()->toArray()
        ]);
    }

    public function closeSessionAction()
    {
        $this->auth->logout();
        $this->execute([
            'action' => 'status'
        ]);
    }

    public function registrationAction()
    {
        if($this->request->isPost()) {
            $validator = new Validation($this->request->getPost());

            $validator->email('email');
            $validator->password('password');

            if(! $validator->validate()) {
                $this->failure([
                    'validation_messages' => $validator->getMessages()
                ], 406);
            } else {

                try {
                    $this->auth->authenticate(
                        $this->request->getPost('email'), $this->request->getPost('password')
                    );
                    $this->execute([
                        'action' => 'status'
                    ]);
                } catch (AuthException $exception) {
                    $this->failure($exception->getMessage());
                } catch (\Exception $exception) {
                    $this->failure($exception->getMessage());
                }

            }
        } else {
            $this->failure("Sorry, but this method is only for POST", 405);
        }
    }

}