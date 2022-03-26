<?php namespace Itpro\Projects\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Redirect;

class TestRequestForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Форма для заявки на тестирование проекта',
            'descripiton' => 'Форма для заявки на тестирование проекта'
        ];
    }

    public function onSend(){
        
    }
}