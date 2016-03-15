<?php

namespace SiteDezz\Controller;

use Dez\Mvc\Controller;
use Dez\ORM\Collection\ModelCollection;
use Dez\Validation\Rules\Required;
use Dez\Validation\Rules\StringLength;
use Dez\Validation\Validation;
use SiteDezz\Model\Entity\ArticleCategories;
use SiteDezz\Model\Entity\Articles;

class ArticlesController extends Controller
{

    public function beforeExecute()
    {

    }

    public function indexAction()
    {

        $article = Articles::one(6);

        foreach ($article->xrefs() as $xref) {
            var_dump($xref->tag()->getName());
        }
        die;

        Articles::published()->pagination($this->request->getQuery('page', 1), 10)->find();
    }

    public function itemAction($id)
    {
        $article = Articles::one($id);

        if(! $article) {
            $this->flash->error("Упс, страничка ID: {$id} на найдена");
            $this->response->redirect($this->url->path('articles'))->sendHeaders();
        }

        $article->setViews($article->getViews() + 1)->save();

        $this->view->set('article', $article);
    }
    
    public function unpublishedAction($id)
    {
        $article = Articles::one($id);

        if($article->getStatus() == Articles::STATUS_PUBLISHED) {
            $this->flash->notice("Страничка уже опубликована");
            $link = $this->url->path("{$article->id()}-{$article->getSlug()}");
            $this->response->redirect($link)->sendHeaders();
        }

        $this->view->set('article', $article);
    }

    public function popularAction()
    {
        $articles = Articles::popular()->pagination($this->request->getQuery('page', 1), 10)->find();

        $this->view->set('articles', $articles);
        $this->view->set('pagination', $articles->getPagination());
    }

    public function categoryAction($id, $slug)
    {

    }

    public function tagAction($id, $slug)
    {

    }

    public function composeAction()
    {

        if($this->request->isPost()) {
            // TODO: implement in dez-http
            $_POST['slug'] = \URLify::filter($this->request->getPost('title'));

            $validator = new Validation($this->request->getPost());

            $validator->add('title', new Required())->add(new StringLength([
                'min' => 2,
                'max' => 128,
            ]));
            $validator->add('category_id', new Required());
            $validator->add('content', new Required())->add(new StringLength([
                'min' => 2,
                'max' => 1024 * 64,
            ]));
            $validator->add('tags', new Required())->add(new StringLength([
                'min' => 2,
                'max' => 64,
            ]));

            if(! $validator->validate()) {
                foreach($validator->getMessages() as $messages) {
                    foreach($messages as $message) {
                        $this->flash->warning($message->getMessage());
                    }
                }
            } else {
                $article = new Articles();

                $article->setTitle($this->request->getPost('title'));
                $article->setCategoryId($this->request->getPost('category_id'));
                $article->setSlug($this->request->getPost('slug'));
                $article->setCopypasteSource($this->request->getPost('copypaste_source'));
                $article->setContent($this->request->getPost('content'));
                $article->setCreatedAt((new \DateTime())->format('Y-m-d H:i:s'));

                if(! $article->save()) {

                } else {
                    $article->createTags($this->request->getPost('tags'));

                    $this->flash->success("Счастье какое! Добавили публикацию!");
                    $link = $this->url->path("{$article->id()}-{$article->getSlug()}");
                    $this->response->redirect($link)->sendHeaders();
                }
            }
        }

        $this->view->set('categoriesTree', ArticleCategories::tree());

    }

    public function editCategoryAction()
    {
        if($this->request->isPost()) {
            $validator = new Validation($this->request->getPost());

            $validator->add('title', new Required())->add(new StringLength([
                'min' => 2,
                'max' => 128,
            ]));

            if(! $validator->validate()) {
                foreach($validator->getMessages() as $messages) {
                    foreach($messages as $message) {
                        $this->flash->warning($message->getMessage());
                    }
                }
            } else {
                $category = new ArticleCategories();

                $category->setTitle($this->request->getPost('title'));
                $category->setParentId($this->request->getPost('parent_id', 0));
                $category->setSlug(\URLify::filter($this->request->getPost('title')));

                if(! $category->save(true)) {
                    $this->flash->error("Ошибка при добавлении категории");
                } else {
                    $this->flash->success("Добавили новую категорию");
                    $link = $this->url->path($this->router->getTargetUri());
                    $this->response->redirect($link)->sendHeaders();
                }
            }
        }

        $this->view->set('categoriesTree', ArticleCategories::tree());
    }

}