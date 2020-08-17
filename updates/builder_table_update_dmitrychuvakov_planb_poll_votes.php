<?php namespace DmitryChuvakov\Planb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDmitrychuvakovPlanbPollVotes extends Migration
{
    public function up()
    {
        Schema::table('dmitrychuvakov_planb_poll_votes', function($table)
        {
            $table->string('device', 255)->nullable()->change();
            $table->string('ip', 255)->nullable()->change();
            $table->string('ip_local', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('dmitrychuvakov_planb_poll_votes', function($table)
        {
            $table->string('device', 255)->nullable(false)->change();
            $table->string('ip', 255)->nullable(false)->change();
            $table->string('ip_local', 255)->nullable(false)->change();
        });
    }
}
