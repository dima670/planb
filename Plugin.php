<?php namespace DmitryChuvakov\Planb;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            '\Dmitrychuvakov\Planb\Components\PlanB' => 'planb'
        ];
    }

    public function registerSettings()
    {
    }
}
