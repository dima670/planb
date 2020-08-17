<?php namespace DmitryChuvakov\Planb\Models;

use Model;

/**
 * Model
 */
class PollItemExport extends \Backend\Models\ExportModel
{

    public function exportData($columns, $sessionKey = null)
    {
        $subscribers = PollItem::withCount('votes')->get();
        $subscribers->each(function($subscriber) use ($columns) {
            $subscriber->addVisible($columns);
        });
        return $subscribers->toArray();
    }
}
