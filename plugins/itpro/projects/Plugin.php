<?php namespace Itpro\Projects;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Itpro\Projects\Components\Technologies' => 'technologies',
            'Itpro\Projects\Components\OrderForm' => 'orderForm',
            'Itpro\Projects\Components\TestRequestForm' => 'testRequestForm'
        ];
    }

    public function registerSettings()
    {
    }
}
