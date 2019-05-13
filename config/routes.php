<?php

use Msgboard\controllers\PostController;
use Msgboard\controllers\MainController;
use Msgboard\controllers\UserController;
use Msgboard\controllers\TestController;

return [
    'signup'    => [UserController::class, 'actionSignup'],
    'signin'    => [UserController::class, 'actionSignin'],
    'logout'    => [UserController::class, 'actionLogout'],
    'post\/add'  => [PostController::class, 'actionAdd'],
    'post\/view' => [PostController::class, 'actionView'],
    'post\/like' => [PostController::class, 'actionLike'],
    'search'    => [MainController::class, 'actionSearch'],
    'test'    => [TestController::class, 'actionTest'],
];
