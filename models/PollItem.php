<?php namespace DmitryChuvakov\Planb\Models;

use Model;

/**
 * Model
 */
class PollItem extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'dmitrychuvakov_planb_poll_items';

    public $attachOne = [
        'photo' => 'System\Models\File'
    ];

    public $belongsTo = [
        'poll' => ['Dmitrychuvakov\Planb\Models\Poll']
    ];

    public $hasMany = [
        'votes' => ['Dmitrychuvakov\Planb\Models\Vote', 'key' => 'item_id']
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
