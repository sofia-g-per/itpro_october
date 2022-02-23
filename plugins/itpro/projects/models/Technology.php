<?php namespace Itpro\Projects\Models;

use Model;

/**
 * Model
 */
class Technology extends Model
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
    public $table = 'itpro_projects_technologies';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    // связи
    public $attachOne = [
        'technology_icon' => 'System\Models\File'
    ];
}
