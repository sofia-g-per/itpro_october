<?php namespace Itpro\Projects\Models;

use Model;

/**
 * Model
 */
class Project extends Model
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
    public $table = 'itpro_projects_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $jsonable = ['images'];

    // связи
    public $belongsTo = [
        'technology' => 'itpro\projects\models\Technology'
    ];

    public $belongsToMany = [
        'platforms' => [
            'itpro\projects\models\Platform',
            'table' => 'itpro_projects_platforms_projects',
            'order' => 'title'
        ]
    ];

    public $attachOne = [
        'project_icon' => 'System\Models\File'
    ];

    public $attachMany = [
        'project_images' => 'System\Models\File'
    ];

    public $hasMany = [
        'requests' => 'itpro\Projects\Models\Request',
    ];
}
