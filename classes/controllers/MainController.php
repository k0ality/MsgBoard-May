<?php
namespace Msgboard\controllers;

use Msgboard\models\PostModel;
use Msgboard\services\DatabaseConnect;
use Msgboard\services\Paginator;

class MainController extends BaseController {

    public function actionIndex() {
        $this->pageTitle = 'Main Page';

        $page = $this->getParam('page', 1);
        $tab  = $this->getParam('tab', 'top');

        $method = $tab == 'new' ? 'getNewestItems' : 'getTopItems';

        $paginator = new Paginator($this->modelFactory, new PostModel);
        $paginator->setCurrentPage($page);
        $paginator->init($method);

        return $this->templateEngine->render('main', ['paginator' => $paginator]);
    }

    public function actionSearch() {
        $this->pageTitle = 'Search results';

        $query = trim($this->getParam('q'));
        $page = $this->getParam('page', 1);

        $query = DatabaseConnect::getInstance()->getDB()->real_escape_string($query);

        $paginator = new Paginator($this->modelFactory, new PostModel);
        $paginator->setCurrentPage($page);

        if ($query) {
            $paginator->init('searchByQuery', [$query]);
        }

        return $this->templateEngine->render('post/serp', ['name' => 'Search results', 'paginator' => $paginator]);
    }


}
