<?php
namespace Msgboard\forms;

use Msgboard\models\BaseModel;

class BaseForm {

    protected $name;
    protected $isValid = null;
    protected $errors  = [];

    protected $tableName;

    /**
     * @var BaseModel
     */
    protected $model;

    protected $fields = [];
    protected $rules  = [];
    protected $labels = [];

    protected $formData = [];

    public function __construct($data = false) {
        $this->fillFormData();
    }

    public function __get($name) {
        $result = $this->formData[$name] ?? null;

        return $result;
    }

    public function validate() {
        foreach ($this->rules as $rule) {
            list($rulename, $fields) = $rule;

            $this->runValidator($rulename, $fields);
        }
    }

    public function isSubmitted() {
        return isset($_POST[$this->name]);
    }

    public function isValid() {
        return count($this->errors) == 0;
    }

    public function getError($field) {
        return $this->errors[$field] ?? null;
    }

    public function getAllErrors() {
        return $this->errors;
    }

    public function getData() {
        return $this->formData;
    }

    public function getLabelFor($field) {
        $result = $this->labels[$field] ?? null;

        return $result;
    }

    public function setModel(BaseModel $model) {
        $this->model = $model;
    }

    protected function runValidator($name, $fields) {
        $method_name = 'run' . ucfirst($name) . 'Validator';

        if (method_exists($this, $method_name)) {
            $this->$method_name($fields);
        }
    }

    protected function runRequiredValidator($fields) {
        $result = true;

        foreach ($fields as $key => $value) {
            if (!$this->formData[$value]) {
                $result = false;

                $this->errors[$value] = "The field cannot be empty";
            }
        }

        return $result;
    }

    protected function runEmailValidator($fields) {
        $result = true;

        foreach ($fields as $value) {
            $field = $this->formData[$value];

            if (!filter_var($field, FILTER_VALIDATE_EMAIL)) {
                $result = false;

                $this->errors[$value] = "Please use a valid email";
            }
        }

        return $result;
    }

    protected function runUniqueValidator($field) {
        $result = true;
        $value = $this->formData[$field];

        if ($this->model) {

            $row = $this->model->findOneBy([$field => $value]);
            var_dump($field);
            var_dump($value);
            var_dump($row);
            var_dump($this->formData);
            //var_dump($_POST);
            //printf($row->id);

//            if ($row->id) {
//                $result = false;
//
//                $this->errors[$field] = "An account for the specified email address already exists.";
//            }
        }

        return $result;
    }

    private function fillFormData($data = false) {
        if (!$this->isSubmitted()) {
            return;
        }

        $fillData = $data ?: $_POST[$this->name];

        foreach ($this->fields as $field) {
            $this->formData[$field] = array_key_exists($field, $fillData) ? $fillData[$field] : null;
        }
    }
}
