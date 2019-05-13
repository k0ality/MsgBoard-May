<?php
namespace Msgboard\forms;

class SignupForm extends BaseForm {

    protected $name = 'signup';

    protected $fields = ['email', 'password', 'name'];
    protected $labels = [
        'email' => 'E-mail',
        'password' => 'Password',
        'name' => 'Username'
    ];
    protected $rules = [
        ['email', ['email']],
        ['unique', 'email'],
        ['required', ['email', 'password', 'name']]
    ];
}
