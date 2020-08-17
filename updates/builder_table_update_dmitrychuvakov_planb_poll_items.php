<?php namespace DmitryChuvakov\Planb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDmitrychuvakovPlanbPollItems extends Migration
{
    public function up()
    {
        Schema::table('dmitrychuvakov_planb_poll_items', function($table)
        {
            $table->dropColumn('photo_id');
        });
    }
    
    public function down()
    {
        Schema::table('dmitrychuvakov_planb_poll_items', function($table)
        {
            $table->integer('photo_id');
        });
    }
}
