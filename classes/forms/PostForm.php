<?php
namespace Msgboard\forms;

class PostForm extends BaseForm {

    protected $fields = ['title', 'description'];
    protected $labels = [
        'title' => 'Title',
        'description' => 'Text'
    ];
    protected $rules = [
        ['required', ['title', 'description']]
    ];

    public function __construct($data = false) {
        $this->name = 'post';

        parent::__construct($data);
    }
}
