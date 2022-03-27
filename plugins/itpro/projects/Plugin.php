<?php namespace Itpro\Projects;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Itpro\Projects\Components\Technologies' => 'technologies',
            'Itpro\Projects\Components\Orderform' => 'Orderform',
            'Itpro\Projects\Components\TestRequestForm' => 'testRequestForm'
        ];
    }

    public function registerSettings()
    {
    }
}
