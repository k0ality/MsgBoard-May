<?php
namespace Msgboard\facades;

use Msgboard\models\PostModel;
use Msgboard\models\UserModel;
use Msgboard\services\ModelFactory;

class PostFacade {

    protected $modelFactory;
    protected $model;
    protected $user;

    public function __construct(ModelFactory $modelFactory, PostModel $model, UserModel $userModel) {
        $this->modelFactory = $modelFactory;
        $this->model = $model;
        $this->user = $userModel;
    }

    public function createAndSavePost(array $form_data) {
        $id = $this->model->createNewPost($this->user->id, $form_data);

        $model = $this->modelFactory->load(get_class($this->model), $id);

        return $model;
    }
}
