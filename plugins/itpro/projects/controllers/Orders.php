<?php namespace Itpro\Projects\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Backend\Facades\BackendAuth;
use Itpro\Projects\Models\Order;
use October\Rain\Support\Facades\Event;

class Orders extends Controller
{
    public $implement = [ 
        'Backend\Behaviors\ListController',        
        'Backend\Behaviors\FormController',        
        'Backend\Behaviors\ReorderController',
        'Backend.Behaviors.RelationController'
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';
    public $user;

    public function listExtendQuery($query, $definition)
    {
        $user = BackendAuth::getUser();
        if ($user->hasPermission('assign_self_orders')) {
            $query->where('manager_id', null)->orWhere('manager_id', $user->id);
        }
    }

    public function __construct()
    {
        $user = BackendAuth::getUser();
        if ($user->hasPermission('assign_self_orders')) {
            $this->listConfig = 'manager_config_list.yaml';
            $this->formConfig = 'manager_config_form.yaml';
        }
        parent::__construct();
        BackendMenu::setContext('Itpro.Projects', 'orders');

    }

    public function onRecordClick()
    {     
        $this->vars['record_id'] = post('record_id');
        $order = Order::find(post('record_id'));
        $this->vars['order'] = $order;
        // если авторизированный пользователь имеет permissions (assign_self_orders) 
        // (присуще менеджерам)
        $user = BackendAuth::getUser();
        if($order->manager_id === null){
            return $this->makePartial('assign_self');
        }
        else if($order->manager_id === $user->id){
            //Загрузка дефолтной формы для заказов в попапе set_status
            //форма отличается от формы для админов благодаря
            // функции в файле Plugin.php
            $this->asExtension('FormController')->update(post('record_id'));
            $this->vars['recordId'] = post('record_id');
            return $this->makePartial('set_status');
        }

    }

    // если менеджер нажал кнопку да на попапе _assign_self.htm
    public function onAssignSelf()
    {
        $user =  BackendAuth::getUser();
        Order::where('id', post('record_id'))->update(['manager_id'=> $user->id]);
        return $this->listRefresh();
    }

    // если менеджер нажал кнопку отправить на форме _set_status.htm
    public function onUpdate()
    {
        $this->asExtension('FormController')->update_onSave(post('record_id'));
        return $this->listRefresh();
    }
}
