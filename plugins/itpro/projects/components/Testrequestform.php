<?php namespace Itpro\Projects\Components;

use Mail;
use Input;
use Redirect;
use Validator;
use Cms\Classes\ComponentBase;
use Itpro\Projects\Models\Project;

class Testrequestform extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Testrequestform',
            'descripiton' => 'Форма для заявки на тестирование проекта'
        ];
    }

    protected function loadProjects(){
        $projects = Project::all();
        return $projects;
    }


    public function onRun(){
        $this->projects = $this->loadProjects();
    }

    public function onSend(){
        
    }

    public $projects;
}