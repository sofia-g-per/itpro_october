<?php namespace Itpro\Projects;

use System\Classes\PluginBase;
use Backend\Facades\BackendAuth;
use Itpro\Projects\Controllers\Orders;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Itpro\Projects\Components\Technologies' => 'technologies',
            'Itpro\Projects\Components\Orderform' => 'orderform',
            'Itpro\Projects\Components\Testrequestform' => 'testrequestform'
        ];
    }

    public function registerSettings()
    {
    }

    public function boot(){
        Orders::extendFormFields(function ($form, $model, $context) {
        
            if (BackendAuth::getUser()->hasPermission('assign_self_orders')) {
                $form->removeField('manager');
            }
        });
    }
}
