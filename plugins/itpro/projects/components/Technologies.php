<?php namespace Itpro\Projects\Components;

use Cms\Classes\ComponentBase;
use Itpro\Projects\Components\Technologies as ComponentsTechnologies;
use Itpro\Projects\Models\Technology;

class Technologies extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Technology list',
            'description' => 'Список технологий для разработки проектов'
        ];
    }

    public function onRun(){
        $this->technologies = $this->loadTechnologies();
    }

    protected function loadTechnologies(){
        $technologies = Technology::all();
        // $technologies->load('projects.platforms', 'projects.platforms.platform_icon', 'projects.project_icon');
        return $technologies;
    }

    public $technologies;

}