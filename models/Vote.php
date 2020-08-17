<?php namespace DmitryChuvakov\Planb\Models;

use Model;

/**
 * Model
 */
class Vote extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'dmitrychuvakov_planb_poll_votes';

    public $belongsTo = [
        'item' => 'Dmitrychuvakov\Planb\Models\PollItem'
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
