<?php namespace DmitryChuvakov\Planb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDmitrychuvakovPlanbPollVotes2 extends Migration
{
    public function up()
    {
        Schema::table('dmitrychuvakov_planb_poll_votes', function($table)
        {
            $table->string('os')->nullable();
            $table->string('resolution')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('dmitrychuvakov_planb_poll_votes', function($table)
        {
            $table->dropColumn('os');
            $table->dropColumn('resolution');
        });
    }
}
