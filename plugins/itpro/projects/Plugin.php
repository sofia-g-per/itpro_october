<?php namespace Itpro\Projects;

use Backend\Models\User;
use System\Classes\PluginBase;
use Backend\Facades\BackendAuth;
use Itpro\Projects\Controllers\Orders;
use Itpro\Projects\Controllers\TestRequests;

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

    public function boot()
    {

        User::extend(function($model) {
            $model->addDynamicMethod('scopeManager', function($query) {
                return $query->whereHas('role', function ($query) {
                    $query->where('code', 'manager');
                });
            });
        });
    }
}
