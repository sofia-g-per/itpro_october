<?php namespace Itpro\Projects\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Redirect;

class OrderForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Order Form',
            'descripiton' => 'Форма для заказа проекта пользователем'
        ];
    }

    public function onSend(){
        
    }
}