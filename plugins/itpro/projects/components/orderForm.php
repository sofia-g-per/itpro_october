<?php namespace Itpro\Projects\Components;

use Mail;
use Input;
use Redirect;
use Validator;
use Cms\Classes\ComponentBase;
use Itpro\Projects\Models\Technology;

class OrderForm extends ComponentBase
{
    public $technologies;

    
    public function componentDetails()
    {
        return [
            'name' => 'Order Form',
            'descripiton' => 'Форма для заказа проекта пользователем'
        ];
    }

    protected function loadTechnologies(){
        $technologies = Technology::all();
        // $technologies->load('projects.platforms', 'projects.platforms.platform_icon', 'projects.project_icon');
        return $technologies;
    }


    public function onRun(){
        $this->technologies = $this->loadTechnologies();
    }

    public function onSend(){
        
    }
}