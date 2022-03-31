<?php namespace Itpro\Projects\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Itpro\Projects\Models\Order;
use October\Rain\Support\Facades\Event;

class Orders extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Itpro.Projects', 'orders');
    }

    public function onRecordClick()
    {     
        $this->vars['recordId'] = post('record_id');
        $this->vars['order'] = Order::find(post('record_id'));
        return $this->makePartial('order_details');
    }
}
