<?php namespace Itpro\Projects\Models;

use Model;

/**
 * Model
 */
class RequestStatus extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'itpro_projects_requests_statuses';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
