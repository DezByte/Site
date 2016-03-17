<?php

namespace SiteDezz\Controller;

use Dez\Html\Element\SelectElement;
use Dez\Mvc\Controller;
use Dez\Validation\Message;
use Dez\Validation\Rules\StringLength;
use Dez\Validation\Validation;
use SiteDezz\Model\Entity\BinSources;
use SiteDezz\Model\Entity\LatinWords;

class BinController extends Controller {

    public function indexAction()
    {
        $this->redirect('bin/share-new');
    }

    public function itemAction($slug, $language)
    {
        $latinSlug = LatinWords::query()->where('word', $slug)->first();
        $this->view->set('bin', $latinSlug->bin());
    }

    public function formattedAction($slug, $language, $format)
    {
        $latinSlug = LatinWords::query()->where('word', $slug)->first();

        if($format == 'raw') {
            $this->response
                ->setContent($latinSlug->bin()->getSourceCode())
                ->setHeader('Content-type', "application/$language")
                ->send();
            die;
        }

    }

    public function shareNewAction()
    {

        $validator = new Validation($this->request->getPost());

        $validator->add('title', new StringLength([
            'min' => 2,
            'max' => 128,
        ]));

        $validator->add('source_code', new StringLength([
            'min' => 2,
            'max' => PHP_INT_MAX - 1,
        ]));

        $validator->required('language');

        if(! $validator->validate()) {
            foreach($validator->getMessages() as $messages) {
                foreach($messages as $message) {
                    /** @var Message $message */
                    $this->flash->warning($message->getMessage());
                }
            }
        } else {
            $bin = new BinSources();

            $bin->setTitle($this->request->getPost('title'));
            $bin->setSourceCode($this->request->getPost('source_code'));
            $bin->setLanguage($this->request->getPost('language'));
            $bin->setSlugKey($this->request->getPost('slug_key'));
            $bin->setCreatedAt((new \DateTime())->format('Y-m-d H:i:s'));

            $bin->save();

            $this->redirect("{$bin->slug()->getWord()}.{$this->request->getPost('language')}");
        }

        $this->view->set('slug', BinSources::randomSlug());
        $this->view->set('select', new SelectElement('language', [
            'PHP' => 'php',
            'Java' => 'java',
            'C++' => 'cpp',
            'Python' => 'python',
            'Ruby' => 'ruby',
            'JavaScript' => 'js',
            'HTML' => 'html',
        ]));

    }

}