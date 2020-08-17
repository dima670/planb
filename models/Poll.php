<?php namespace DmitryChuvakov\Planb\Models;

use Model;

/**
 * Model
 */
class Poll extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'dmitrychuvakov_planb_polls';

    public $hasMany = [
        'items' => [PollItem::class]
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
