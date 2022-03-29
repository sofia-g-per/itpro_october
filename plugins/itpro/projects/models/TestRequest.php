<?php namespace Itpro\Projects\Models;

use Model;

/**
 * Model
 */
class TestRequest extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'itpro_projects_requests';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    
    //связи

    public $belongsTo = [
        'project' => 'itpro\projects\models\Project',
        'status' => 'itpro\projects\models\RequestStatus',
        'client' => 'itpro\projects\models\Client',
        'manager' => 'backend\models\User'
    ];
}
