<?php namespace DmitryChuvakov\Planb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDmitrychuvakovPlanbPollVotes extends Migration
{
    public function up()
    {
        Schema::create('dmitrychuvakov_planb_poll_votes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('item_id')->nullable();
            $table->string('device');
            $table->string('ip');
            $table->string('ip_local');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dmitrychuvakov_planb_poll_votes');
    }
}
