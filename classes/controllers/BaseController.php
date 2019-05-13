<?php
namespace Msgboard\controllers;

use Msgboard\helpers\AppRegistry;
use Msgboard\models\UserModel;
use Msgboard\services\AuthUser;
use Msgboard\services\ModelFactory;
use League\Plates\Engine;

class BaseController {

    protected $templateEngine;
    protected $modelFactory;
    protected $user;

    protected $rules = [
        'guest' => ["/post/add", "/logout"],
        'user'  => ["/signin", "/signup"]
    ];

    protected $pageTitle;

    public function __construct(Engine $templateEngine, ModelFactory $modelFactory) {
        $this->templateEngine = $templateEngine;
        $this->modelFactory = $modelFactory;
        $this->user = new AuthUser(UserModel::class, $modelFactory);
        $this->templateEngine->addData(['ctrl' => $this]);
    }

    public function getTitle() {
        $title = AppRegistry::getTitle();

        if ($this->pageTitle) {
            $title = $this->pageTitle . ' | ' . $title;
        }

        return $title;
    }

    public function redirect($path) {
        header("Location: " . $path);
        exit;
    }

    public function beforeAction() {
        $this->user->proceedAuth();

        $uri = $_SERVER['REQUEST_URI'];
        $this->templateEngine->addData(['user' => $this->user]);

        $rules = $this->user->isGuest() ? $this->rules['guest'] : $this->rules['user'];

        if (in_array($uri, $rules)) {
            $this->redirect('/');
        }
    }

    public function getParam($name, $default = null) {
        $value = $_REQUEST[$name] ?? $default;

        return $value;
    }
}
