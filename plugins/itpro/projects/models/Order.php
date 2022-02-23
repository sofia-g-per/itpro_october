<?php namespace Itpro\Projects\Models;

use Model;

/**
 * Model
 */
class Order extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'itpro_projects_orders';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    //связи
    public $belongsTo = [
        'technology' => 'itpro\projects\models\technology',
        'status' => 'itpro\projects\models\orderStatus',
        'client' => 'itpro\projects\models\client',
    ];

    public $attachOne = [
        'order_file' => 'System\Models\File'
    ];

}
