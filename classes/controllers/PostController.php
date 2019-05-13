<?php
namespace Msgboard\controllers;

use Msgboard\forms\PostForm;
use Msgboard\models\PostModel;
use Msgboard\facades\PostFacade;

class PostController extends BaseController {

    public function actionAdd() {
        $this->pageTitle = 'Post a new message';
        $form  = new PostForm();

        $model = $this->modelFactory->getEmptyModel(PostModel::class);

        if ($form->isSubmitted()) {
            $form->validate();

            if ($form->isValid()) {

                $postFacade = new PostFacade($this->modelFactory, $model, $this->user->getUserModel());
                $postModel = $postFacade->createAndSavePost($form->getData());

                $this->redirect('/post/view?id=' . $postModel->id);
            }
        }

        return $this->templateEngine->render('post/add', ['form' => $form]);
    }

    public function actionView() {
        $id = $this->getParam('id');

        $postModel = $this->modelFactory->load(PostModel::class, $id);
        $this->pageTitle = $postModel->title;

        $postModel->changeCounter('show_count', '+');

        $view_params = ['id' => $id, 'post' => $postModel];
        return $this->templateEngine->render('post/view', $view_params);
    }

    public function actionLike() {
        $id  = $this->getParam('id');
        $removed = $this->getParam('removed');

        $gifModel  = $this->modelFactory->load(PostModel::class, $id);
        $user = $this->user->getUserModel();

        if ($removed) {
            $gifModel->removeLike($user);
        }
        else {
            $gifModel->addLike($user);
        }

        $this->redirect('/post/view?id=' . $id);
    }

}
